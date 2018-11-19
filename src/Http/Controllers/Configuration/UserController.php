<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017, 2018  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Web\Http\Controllers\Configuration;

use Illuminate\Http\Request;
use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Services\Repositories\Configuration\UserRespository;
use Seat\Web\Http\Controllers\Controller;
use Seat\Web\Http\Validation\EditUser;
use Seat\Web\Http\Validation\ReassignUser;
use Seat\Web\Models\Group;
use Seat\Web\Models\User;
use Yajra\Datatables\Datatables;

/**
 * Class UserController.
 * @package Seat\Web\Http\Controllers\Configuration
 */
class UserController extends Controller
{
    use UserRespository;

    /**
     * @return \Illuminate\View\View
     */
    public function getAll()
    {

        if(\request()->ajax()){

            $groups = $this->getAllFullUsers();

            return Datatables::of($groups)
                ->editColumn('refresh_token', function ($row) {
                    return view('web::configuration.users.partials.refresh-token', compact('row'));
                })
                ->editColumn('name', function ($row) {

                    if($row->id === 1)
                        return "Admin";

                    $character = CharacterInfo::find($row->id) ?: $row->id;

                    return view('web::partials.character', compact('character'));
                })
                ->editColumn('last_login', function ($row) {
                    return human_diff($row->last_login);
                })
                ->editColumn('email', function ($row){
                    if( empty($row->email) )
                        return trans('web::seat.no_email');

                    return $row->email;
                })
                ->addColumn('action_buttons', function ($row) {
                    return view('web::configuration.users.partials.action-buttons', compact('row'));
                })
                ->addColumn('roles', function (User $user) {
                    return $user->group->roles->map(function ($role){
                        return $role->title;
                    })->implode(', ');
                })
                ->addColumn('main_character', function (User $user) {

                    return optional($user->group->main_character)->name ?: "";
                })
                ->addColumn('main_character_blade', function (User $user) {

                    $main_character_id = optional($user->group->main_character)->character_id ?: null;

                    $character = CharacterInfo::find($main_character_id) ?: $main_character_id;

                    return view('web::partials.character', compact('character'));
                })
                ->filterColumn('main_character', function ($query,$keyword){
                    $group_id = Group::all()->filter(function ($group) use ($keyword) {

                        return false !== stristr(optional($group->main_character)->name,$keyword);
                    })->map(function ($group){ return $group->id; });

                    $query->whereIn('users.group_id',$group_id->toArray());
                })
                ->filterColumn('email', function ($query,$keyword){
                    $user_id = User::all()->filter(function ($user) use ($keyword) {

                        return false !== stristr($user->email,$keyword);
                    })->map(function ($user){ return $user->id; });

                    $query->whereIn('users.id',$user_id->toArray());
                })
                ->make(true);

        }

        return view('web::configuration.users.list');
    }

    /**
     * @param $user_id
     *
     * @return \Illuminate\View\View
     */
    public function editUser($user_id)
    {

        $user = $this->getFullUser($user_id);

        // get all groups except the one containing admin as admin account is special account
        // and the one to which the current user is already attached.
        $groups = $this->getAllGroups()->filter(function ($group, $key) use ($user_id) {

            return $group->users->where('name', 'admin')->isEmpty() && $group->users->where('id', $user_id)->isEmpty();
        });

        $login_history = $user->login_history()->orderBy('created_at', 'desc')->take(15)
            ->get();

        return view('web::configuration.users.edit',
            compact('user', 'groups', 'login_history'));
    }

    /**
     * @param \Seat\Web\Http\Validation\EditUser $request
     *
     * @return mixed
     */
    public function updateUser(EditUser $request)
    {

        $user = $this->getUser($request->input('user_id'));

        $user->fill([
            'email' => $request->input('email'),
        ]);

        $user->save();

        return redirect()->back()
            ->with('success', trans('web::seat.user_updated'));
    }

    /**
     * @param \Seat\Web\Http\Validation\ReassignUser $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postReassignuser(ReassignUser $request)
    {

        $user = $this->getUser($request->input('user_id'));
        $current_group = $user->group;

        $user->fill([
            'group_id' => $request->input('group_id'),
        ]);

        $user->save();

        // Ensure the old group is not an orphan now.
        if ($current_group->users->isEmpty()) $current_group->delete();

        return redirect()->back()
            ->with('success', trans('web::seat.user_updated'));
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function editUserAccountStatus($user_id)
    {

        $this->flipUserAccountStatus($user_id);

        return redirect()->back()
            ->with('success', trans('web::seat.account_status_change'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $user_id
     *
     * @return mixed
     */
    public function deleteUser(Request $request, $user_id)
    {

        if ($request->user()->id == $user_id)
            return redirect()->back()
                ->with('warning', trans('web::seat.self_delete_warning'));

        $user = $this->getUser($user_id);
        $group = $user->group;

        // Delete the user.
        $user->delete();

        // Ensure the orphan group is cleaned up.
        if ($group->users->isEmpty()) $group->delete();

        return redirect()->back()
            ->with('success', trans('web::seat.user_deleted'));
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function impersonate($user_id)
    {

        // Store the original user in the session
        session(['impersonation_origin' => auth()->user()]);

        // Get the user
        $user = $this->getUser($user_id);

        // Log the impersonation event.
        event('security.log', [
            'Impersonating ' . $user->name, 'authentication',
        ]);

        // Login as the new user.
        auth()->login($user);

        return redirect()->route('home')
            ->with('success',
                trans('web::seat.impersonating', ['user' => $user->name]));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getStopImpersonate()
    {

        // If there is no user set in the session, abort!
        if (! session()->has('impersonation_origin'))
            abort(404);

        // Log the impersonation revert event.
        event('security.log', [
            'Reverting impersonation back to ' . session()->get('impersonation_origin')->name,
            'authentication',
        ]);

        // Login
        auth()->login(session('impersonation_origin'));

        // Clear the session value
        session()->forget('impersonation_origin');

        return redirect()->route('home')
            ->with('success', trans('web::seat.revert_impersonation'));

    }
}
