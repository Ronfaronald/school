<?php

$factory->define(App\Ministry::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "body" => $faker->name,
    ];
});
