<?php

$factory->define(App\School::class, function (Faker\Generator $faker) {
    return [
        "school" => $faker->name,
        "type" => collect(["private","government","mission","council",])->random(),
        "gender" => collect(["mixed","boys","girls",])->random(),
        "religion" => collect(["roman catholic","the salvation army","anglican","methodist in zimbabwe","united methodist","zcc",])->random(),
        "price" => $faker->randomNumber(2),
        "academic" => $faker->randomNumber(2),
        "sports" => $faker->randomNumber(2),
        "culture" => $faker->randomNumber(2),
        "province" => collect(["harare","bulawayo","midlands","mashonaland central","mashonaland east","mashonaland west","masvingo","matabeleland north","matabeleland south","manicaland",])->random(),
        "city" => collect(["harare","bulawayo","mutare","gweru",])->random(),
        "level" => collect(["secondary","primary","ecd",])->random(),
        "district" => $faker->name,
        "rural_urban" => collect(["urban","rural","growth point","farm",])->random(),
    ];
});
