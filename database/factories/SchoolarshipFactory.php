<?php

$factory->define(App\Schoolarship::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "link" => $faker->name,
        "email" => $faker->safeEmail,
        "description" => $faker->name,
    ];
});
