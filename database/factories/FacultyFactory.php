<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faculty;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    $facultyName = $faker->words(3, true);

    return [
        'faculty_name' => ucfirst($facultyName)
    ];
});
