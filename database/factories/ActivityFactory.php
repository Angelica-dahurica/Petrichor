<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Activity::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Activity($faker));

    return [
        'activity_creator' => random_int(0, 200),
        'activity_name' => $faker->activity,
//        'activity_fee' => round($faker->randomFloat(1000, 0, 999),2),
        'activity_fee' => 0,
        'activity_description' => $faker->sentence(),
        'activity_location' => $faker->address,
        'activity_time' => $faker->dateTimeInInterval('0 years', '+2 months'),
        'activity_limitnum' => random_int(1, 1000)
    ];
});
