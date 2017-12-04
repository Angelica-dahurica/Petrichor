<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Album::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Tag($faker));

    return [
        'album_creator' => random_int(0, 200),
        'album_name' => $faker->word,
        'album_description' => $faker->sentence(),
        'album_createtime' => $faker->dateTimeInInterval('0 years', '-2 months'),
        'album_tags' => $faker->tags
    ];
});
