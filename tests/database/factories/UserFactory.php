<?php

use Faker\Generator as Faker;
use Seat\Web\Models\Group;
use Seat\Web\Models\User;

$factory->define(User::class, function (Faker $faker) {

    return [
        'id'                   => $faker->numberBetween(90000000, 98000000),
        'group_id'             => Group::create()->id,
        'name'                 => $faker->name,
        'active'               => true,
        'character_owner_hash' => 'testbench',
    ];
});