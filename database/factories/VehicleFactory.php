<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Model;
use App\Owner;
use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'plate' => strtoupper(Str::random(6)),
        'year' => rand(1980, now()->year),
        'brand_id' => Brand::inRandomOrder()->first()->id,
        'owner_id'=> Owner::inRandomOrder()->first()->id,
    ];
});
