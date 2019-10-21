<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flight;
use Faker\Generator as Faker;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'from' => $faker->city,
        'to' => $faker->city,
        'depature_date' => $faker->dateTimeThisMonth($max = 'now'),
        'arrivale_date' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 5 days'),
        'seats' => $faker->numberBetween(1,6),
        'duration' => $faker->numberBetween(1,15),
    ];
});
