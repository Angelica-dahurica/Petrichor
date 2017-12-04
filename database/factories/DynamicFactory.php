<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Dynamic::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Tag($faker));

    return [
        'dynamic_creator' => random_int(0, 200),
        'dynamic_type' => 0,
        'dynamic_repost' => random_int(1, 50),
        'dynamic_like' => random_int(1, 100),
        'dynamic_content' => $faker->imageUrl(),
        'dynamic_publishtime' => $faker->dateTimeInInterval('0 years', '-2 months'),
        'dynamic_tags' => $faker->tags
    ];
});