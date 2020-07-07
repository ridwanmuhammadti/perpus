<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pasien;
use Faker\Generator as Faker;

$factory->define(Pasien::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(['13','14']),
        'nik' => $faker->numberBetween($min = 1000000000, $max = 99090000),
        'name' => $faker->name,
        'email' => $faker->freeEmail,
        'jenis_kelamin' => $faker->randomElement(['L','P']),
        'tgl_lahir' => $faker->dateTimeBetween($startDate = '-40 years', $endDate = 'now', $timezone = null),
        'alamat' => $faker->address,

    ];
});
