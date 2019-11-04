<?php
use App\Models\ProductExtraSauce;
use Faker\Generator;

$factory->define(ProductExtraSauce::class, function (Generator $faker) {
    return [
        'title' => $faker->realText(20),


    ];
});
