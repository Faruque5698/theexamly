<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Backend\Category;
use App\User;

$factory->define(Category::class, function (Faker $faker) {

    $image = $faker->randomElement([
        'b1.png', 'b2.png', 'b3.png', 'b4.png', 'b5.png',
        'b6.png', 'b7.png', 'b8.png', 'b9.png', 'b10.png',
        'b11.png', 'b12.png', 'b13.png', 'b14.png', 'b15.png',
        'b16.png', 'b17.png', 'b18.png', 'b19.png', 'b20.png'
    ]);

    $name = $faker->word . ' ' . $faker->word . ' ' . $faker->word;


    return [
        'name' => $name,
        'creator_ip' => '' . $faker->numberBetween(1, 227) . '.' . $faker->numberBetween(1, 227) . '.' . $faker->numberBetween(1, 227) . '.' . $faker->numberBetween(1, 227),
        'image' => $image,
        'description' => $faker->text . ' ' . $faker->text,
        'keywords' => $faker->word . ', ' . $faker->word . ',' . $faker->word,
        'priority' => $faker->numberBetween(1, 10),
        'created_by' => function () {
            return User::all()->random();
        }
    ];
});
