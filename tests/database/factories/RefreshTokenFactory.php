<?php

use Faker\Generator as Faker;
use Seat\Eveapi\Models\RefreshToken;

$factory->define(RefreshToken::class, function (Faker $faker) {

    return [
        'character_id'  => $faker->numberBetween(9000000, 98000000),
        'refresh_token' => $faker->isbn13,
        'scopes'        => collect([$faker->realText($faker->numberBetween(10,20))])->toJson(),
        'expires_on'    => $faker->dateTime(),
        'token'         => $faker->realText($faker->numberBetween(10,20)),
    ];
});
