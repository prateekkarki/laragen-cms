<?php
use App\Models\Extra;
use Faker\Generator;

$factory->define(Extra::class, function (Generator $faker) {
    return [
        'title' => $faker->realText(20),


    ];
});
