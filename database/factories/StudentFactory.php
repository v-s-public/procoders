<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Helpers\ArrayHelper;
use App\Models\Student;
use App\Models\Group;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $name = $faker->firstName();
    $patronymic = $faker->firstName('male');
    $surname = $faker->lastName;
    $dateOfBirth = $faker->dateTimeBetween($startDate = '-50 years', $endDate = '-17 years');
    $groupId = ArrayHelper::getRandomValue(Group::getAllGroupsIds());

    return [
        'name' => ucfirst($name),
        'patronymic' => ucfirst($patronymic),
        'surname' => ucfirst($surname),
        'date_of_birth' => $dateOfBirth->format('Y-m-d'),
        'group_id' => $groupId
    ];
});
