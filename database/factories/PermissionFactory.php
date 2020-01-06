<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    $first = $faker->word;
    $second = $faker->word;
    $name = $first . " " . $second;
    $slug = $first . "_" . $second;
    return [
        'nombre' => $name,
        'slug' => $slug,
    ];
});
