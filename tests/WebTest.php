<?php


namespace Seat\Web\Test;


use Seat\Web\Models\User;

class WebTest extends TestCase
{
    public function testHome()
    {
        $user_without_refresh_token = factory(User::class)->create();
        auth()->login($user_without_refresh_token);
        //$response = redirect()->intended('home');

        $response = $this->actingAs(User::find($user_without_refresh_token->id))
            ->get('/home');

        //dd(route('home'));
        //$response = $this->followingRedirects()->get(route('home'));

        dd($response->getStatusCode());

        $response = $this->followRedirects($response);


        var_dump($response->getContent());
        // Assert if redirect happens
        $this->assertEquals(302, $response->getStatusCode());


    }

}