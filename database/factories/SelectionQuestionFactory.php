<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entity\SelectionQuestion::class, function (Faker $faker) {
    return [
        'question' => $faker->paragraph,
        'answer' => $faker->boolean,
    ];
});
