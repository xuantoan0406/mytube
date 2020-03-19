<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SvModel;
use Faker\Generator as Faker;

$factory->define(SvModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lop' => '2'
    ];
});
