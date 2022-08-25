<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;
use App\Permission;
use App\Models\Backend\Module;
use Illuminate\Support\Str;

$factory->define(Permission::class, function (Faker $faker) {

    $word = $faker->word . ' ' . $faker->word;

    $description = $faker->sentence;

    return [
        'name' => $faker->unique()->word . ' ' . $faker->unique()->word,
        'description' => $description,
        'module_id' => function () {
            return Module::all()->random();
        },
        'display_name' => Str::title($word),
        'created_by' => function () {
            return User::all()->random();
        }
    ];
});
