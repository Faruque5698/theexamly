<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Backend\Module;
use App\User;

$factory->define(Module::class, function (Faker $faker) {

    $word = $faker->word . ' ' . $faker->word;

    return [
        'name' => $word,
        'created_by' => function () {
            return User::all()->random();
        }
    ];
});
