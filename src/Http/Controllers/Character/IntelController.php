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

namespace Seat\Web\Http\Controllers\Character;

use Illuminate\Support\Collection;
use Seat\Eveapi\Models\Character\CharacterAffiliation;
use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Eveapi\Models\Corporation\CorporationInfo;
use Seat\Eveapi\Models\Universe\UniverseName;
use Seat\Services\Repositories\Character\Intel;
use Seat\Web\Http\Controllers\Controller;
use Seat\Web\Http\Validation\NewIntelNote;
use Seat\Web\Http\Validation\UpdateIntelNote;
use Yajra\DataTables\DataTables;

/**
 * Class IntelController.
 * @package Seat\Web\Http\Controllers\Character
 */
class IntelController extends Controller
{
    use Intel;

    /**
     * @var int
     */
    protected $top_limit = 10;

    /**
     * @param int $character_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIntelSummary(int $character_id)
    {

        return view('web::character.intel.summary');
    }

    /**
     * @param int $character_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTopWalletJournalData(int $character_id)
    {

        $top = $this->characterTopWalletJournalInteractions($character_id);

        return DataTables::of($top)
            ->editColumn('ref_type', function ($row) {

                return ucwords(str_replace('_', ' ', $row->ref_type));
            })
            ->addColumn('character', function ($row) {

                $character_id = $row->character_id;

                $universe_name = $this->getUniverseNameResolved($character_id, $row->first_party_id, $row->second_party_id);


                if ($universe_name->has('unknown_id'))
                    return view('web::partials.unknown', [
                        'unknown_id' => $universe_name['unknown_id'],
                        'character_id' => $character_id,
                    ]);

                if (!$universe_name->has('character_id')) {

                    return '';
                }

                $character = CharacterInfo::find($universe_name['character_id']) ?: $universe_name['character_id'];

                return view('web::partials.character', compact('character', 'character_id'));
            })
            ->editColumn('corporation', function ($row) {

                $character_id = $row->character_id;

                $universe_name = $this->getUniverseNameResolved($character_id, $row->first_party_id, $row->second_party_id);

                if ($universe_name->has('unknown_id'))
                    return view('web::partials.unknown', [
                        'unknown_id' => $universe_name['unknown_id'],
                        'character_id' => $character_id,
                    ]);

                if (!$universe_name->has('corporation_id')) {

                    return '';
                }

                $corporation = CorporationInfo::find($universe_name['corporation_id']) ?: $universe_name['corporation_id'];

                return view('web::partials.corporation', compact('corporation', 'character_id'));


            })
            ->addColumn('alliance', function ($row) {

                $character_id = $row->character_id;

                $universe_name = $this->getUniverseNameResolved($character_id, $row->first_party_id, $row->second_party_id);

                if ($universe_name->has('unknown_id'))
                    return view('web::partials.unknown', [
                        'unknown_id' => $universe_name['unknown_id'],
                        'character_id' => $character_id,
                    ]);

                if (!$universe_name->has('alliance_id')) {

                    return '';
                }

                $alliance = $universe_name['alliance_id'];

                return view('web::partials.alliance', compact('alliance', 'character_id'));
            })
            ->rawColumns(['character', 'corporation', 'alliance'])
            ->make(true);

    }

    /**
     * @param int $character_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTopTransactionsData(int $character_id)
    {

        $top = $this->characterTopWalletTransactionInteractions($character_id);

        return DataTables::of($top)
            ->editColumn('character_id', function ($row) {

                return view('web::character.intel.partials.charactername', compact('row'))
                    ->render();
            })
            ->editColumn('corporation_id', function ($row) {

                return view('web::character.intel.partials.corporationname', compact('row'))
                    ->render();
            })
            ->editColumn('alliance_id', function ($row) {

                return view('web::character.intel.partials.alliancename', compact('row'))
                    ->render();
            })
            ->rawColumns(['character_id', 'corporation_id', 'alliance_id'])
            ->make(true);

    }

    /**
     * @param int $character_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTopMailFromData(int $character_id)
    {

        $top = $this->characterTopMailInteractions($character_id);

        return DataTables::of($top)
            ->editColumn('character_id', function ($row) {

                return view('web::character.intel.partials.charactername', compact('row'))
                    ->render();
            })
            ->editColumn('corporation_id', function ($row) {

                return view('web::character.intel.partials.corporationname', compact('row'))
                    ->render();
            })
            ->editColumn('alliance_id', function ($row) {

                return view('web::character.intel.partials.alliancename', compact('row'))
                    ->render();
            })
            ->rawColumns(['character_id', 'corporation_id', 'alliance_id'])
            ->make(true);
    }

    /**
     * @param int $character_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStandingsComparison(int $character_id)
    {

        $profiles = $this->standingsProfiles();

        return view('web::character.intel.standingscompare', compact('profiles'));
    }

    /**
     * @param int $character_id
     * @param int $profile_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function getCompareStandingsWithProfileData(int $character_id, int $profile_id)
    {

        $journal = $this->getCharacterJournalStandingsWithProfile($character_id, $profile_id);

        return DataTables::of($journal)
            ->editColumn('characterName', function ($row) {

                return view('web::character.intel.partials.charactername', compact('row'))
                    ->render();
            })
            ->editColumn('corporationName', function ($row) {

                return view('web::character.intel.partials.corporationname', compact('row'))
                    ->render();
            })
            ->editColumn('allianceName', function ($row) {

                return view('web::character.intel.partials.alliancename', compact('row'))
                    ->render();
            })
            ->rawColumns(['characterName', 'corporationName', 'allianceName'])
            ->make(true);

    }

    /**
     * @param int $character_id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNotes(int $character_id)
    {

        return view('web::character.intel.notes');

    }

    /**
     * @param int $character_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getNotesData(int $character_id)
    {

        return DataTables::of(CharacterInfo::getNotes($character_id))
            ->addColumn('actions', function ($row) {

                return view('web::character.intel.partials.notesactions', compact('row'))
                    ->render();
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    /**
     * @param int $character_id
     * @param int $note_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSingleNotesData(int $character_id, int $note_id)
    {

        return response()->json(
            CharacterInfo::getNote($character_id, $note_id)->first());

    }

    /**
     * @param \Seat\Web\Http\Validation\NewIntelNote $request
     * @param int                                    $character_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddNew(NewIntelNote $request, int $character_id)
    {

        CharacterInfo::addNote(
            $character_id, $request->input('title'), $request->input('note'));

        return redirect()->back()
            ->with('success', 'Note Added');

    }

    /**
     * @param int $character_id
     * @param int $note_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteNote(int $character_id, int $note_id)
    {

        CharacterInfo::deleteNote($character_id, $note_id);

        return redirect()->back()
            ->with('success', 'Note deleted!');

    }

    /**
     * @param \Seat\Web\Http\Validation\UpdateIntelNote $request
     * @param int                                       $character_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdateNote(UpdateIntelNote $request, int $character_id)
    {

        CharacterInfo::updateNote(
            $character_id, $request->input('note_id'),
            $request->input('title'),
            $request->input('note'));

        return redirect()->back()
            ->with('success', 'Note updated!');

    }

    private function getUniverseNameResolved(int $character_id, int $first_party_id, int $second_party_id = null) : Collection
    {
        // f.e. market escrow -> self referential payment.
        if($first_party_id === $second_party_id)
            return collect([
                'character_id' => $character_id,
                'corporation_id' => CharacterInfo::find($character_id)->corporation_id,
                'alliance_id' => CharacterInfo::find($character_id)->alliance_id
            ]);

        return collect([UniverseName::find($first_party_id), UniverseName::find($second_party_id)])
            ->filter()
            ->filter(function ($universe_name) use ($character_id){

                return $universe_name->entity_id !== $character_id;
            })
            ->pipe(function ($collection) use ($character_id, $first_party_id,$second_party_id) {

                if ($collection->isNotEmpty()){

                    return $collection->flatten()->map(function ($item) {

                        if($item->category === 'character')
                            return collect([
                                'character_id' => $item->entity_id,
                                'corporation_id' => optional(CharacterAffiliation::find($item->entity_id))->corporation_id,
                                'alliance_id' => optional(CharacterAffiliation::find($item->entity_id))->alliance_id
                            ])->filter();

                        if($item->category === 'corporation')
                            return collect([
                                'corporation_id' => $item->entity_id,
                                'alliance_id' => optional(CharacterAffiliation::where('corporation_id',$item->entity_id)->get()->first())->alliance_id
                            ])->filter();

                        if($item->category === 'alliance')
                            return collect(['alliance_id' => $item->entity_id]);

                        return collect(['other_resolved_id' => $item->entity_id]);
                    })->filter();
                }

                return $collection->push(collect(['unknown_id' => $character_id !== $first_party_id ? $first_party_id : $second_party_id]));
            })
            ->flatMap(function ($value) {

                return $value;
            });
    }
}
