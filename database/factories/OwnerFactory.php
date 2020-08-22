<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identification' => rand(1000000,99999999),
    ];
});
