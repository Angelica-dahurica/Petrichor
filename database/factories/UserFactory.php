<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\User::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Tag($faker));

    return [
        'nickname' => $faker->lastName . $faker->firstNameMale,
        'sex' => 1,
        'interest' =>$faker->tags,
        'password' => $faker->password(7,14),
        'avatar' => $faker->imageUrl(),
        'age' => random_int(0, 150),
        'signature' => $faker->sentence(13)
    ];
});
