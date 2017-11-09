<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Activity::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Activity($faker));

    $userlist = array();
    $len = random_int(1,10);
    for($i = 0; $i < $len; $i++){
        array_push($userlist, random_int(1,200));
    }
    array_unique($userlist);
    $text = implode(';', $userlist);

    return [
        'activity_creator' => $userlist[random_int(0, $len-1)],
        'activity_name' => $faker->activity,
//        'activity_fee' => round($faker->randomFloat(1000, 0, 999),2),
        'activity_fee' => 0,
        'activity_description' => $faker->sentence(),
        'activity_location' => $faker->address,
        'activity_time' => $faker->dateTimeInInterval('0 years', '+2 months'),
        'activity_limitnum' => random_int(1, 1000),
        'activity_userlist' => $text
    ];
});
