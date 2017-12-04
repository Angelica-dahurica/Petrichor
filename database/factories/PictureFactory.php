<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Picture::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    //$faker->addProvider(new \App\Providers\Album($faker));
    $faker->addProvider(new \App\Providers\Tag($faker));

    return [
        'picture_album' => random_int(0, 100),
        'picture_name' => $faker->word,
        'picture_description' => $faker->sentence(),
        'picture_content' => $faker->imageUrl(),
        'picture_publishtime' => $faker->dateTimeInInterval('0 years', '-2 months'),
        'picture_tags' => $faker->tags
    ];
});
