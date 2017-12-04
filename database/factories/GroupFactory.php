<?php

require __DIR__ .'/../../vendor/fzaninotto/faker/src/autoload.php';

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Group::class, function () {

    $faker = Faker\Factory::create('zh_CN');
    $faker->addProvider(new \App\Providers\Tag($faker));

    return [
        'group_creator' => random_int(0, 200),
        'group_name' => $faker->word,
        'group_createtime' => $faker->dateTimeInInterval('0 years', '-2 months'),
        'group_tags' => $faker->tags,
        'group_description' => $faker->sentence(13)
    ];
});
