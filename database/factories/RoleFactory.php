<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Role;
use App\User;
use Illuminate\Support\Str;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->userName . '-' . $faker->userName,
        'description' => $faker->text,
        'display_name' => Str::title($faker->name),
        'created_by' => function () {
            return User::all()->random();
        }
    ];
});
