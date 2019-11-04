<?php
use App\Models\ProductTeam;
use App\Models\Product;
use App\Models\Extra;
use Faker\Generator;

$factory->define(ProductTeam::class, function (Generator $faker) {
    return [

        'product_id' => function () {
            return Product::inRandomOrder()->first()->id;
        },
        'team_id' => function () {
            return Extra::inRandomOrder()->first()->id;
        },

    ];
});
