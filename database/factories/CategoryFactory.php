<?php
use App\Models\Category;
use Faker\Generator;

$factory->define(Category::class, function (Generator $faker) {
    return [
        'title' => $faker->realText(20),


    ];
});
