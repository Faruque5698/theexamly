<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Backend\PostImage;
use App\Models\Backend\Post;

$factory->define(PostImage::class, function (Faker $faker) {

    $image = $faker->randomElement([
        'b1.png', 'b2.png', 'b3.png', 'b4.png', 'b5.png',
        'b6.png', 'b7.png', 'b8.png', 'b9.png', 'b10.png',
        'b11.png', 'b12.png', 'b13.png', 'b14.png', 'b15.png',
        'b16.png', 'b17.png', 'b18.png', 'b19.png', 'b20.png'
    ]);

    return [
        'post_id' => function () {
            return Post::all()->random();
        },
        'image_file' => $image,
        'order_image' => $faker->numberBetween(1, 10)
    ];
});
