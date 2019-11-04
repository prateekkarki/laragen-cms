<?php
use App\Models\Product;
use App\Models\Extra;
use App\Models\Category;
use Faker\Generator;

$factory->define(Product::class, function (Generator $faker) {
    return [
        'title' => $faker->realText(20),
        'slug' => $faker->slug,
        'short_description' => $faker->realText(150),

        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },

    ];
});
