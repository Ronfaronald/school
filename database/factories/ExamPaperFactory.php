<?php

$factory->define(App\ExamPaper::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "catergory" => collect(["maths","english","shona","geography ",])->random(),
        "date" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
