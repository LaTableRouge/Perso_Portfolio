<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Magasin::class, function (Faker $faker) {
    return [
        'nomMag' => $faker->name,
        'ad1Mag' => $faker->address,
        'latMag' => $faker->latitude($min = -90, $max = 90),
        'longMag' => $faker->longitude($min = -180, $max = 180),
        'telMag' => $faker->phoneNumber,
        'mailMag' => $faker->unique()->safeEmail,
        // 'siretMag' => $faker-> ,
        'photo1Mag' => $faker-> imageUrl($width = 480, $height = 640, 'cats')
    ];
});
