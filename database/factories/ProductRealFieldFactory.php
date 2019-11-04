<?php
use App\Models\ProductRealField;
use App\Models\Product;
use Faker\Generator;

$factory->define(ProductRealField::class, function (Generator $faker) {
    return [
        'size' => $faker->randomNumber(),

        'product_id' => function () {
            return Product::inRandomOrder()->first()->id;
        },

    ];
});
