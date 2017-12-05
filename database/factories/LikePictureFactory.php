<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\LikePicture::class, function () {

    $faker = Faker\Factory::create('zh_CN');

    return [
        'userid' => random_int(0, 200),
//        'userid' => 209,
        'pictureid' => random_int(1, 135),
        'like_time' => $faker->dateTimeInInterval('0 years', '-1 months')
    ];
});
