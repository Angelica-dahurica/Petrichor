<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'activity_creator',
        'activity_name' => $faker->name(),
        'activity_fee' => $faker->randomFloat(),
        'activity_description' => str_random(),
        'activity_location' => str_random(),
        'activity_time' => $faker->dateTime(),
        'activity_limitnum' => random_int(1, 10000),
        'activit_userlist' => str_random()
    ];
});
