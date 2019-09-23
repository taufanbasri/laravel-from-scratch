<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Customer::class, function (Faker $faker) {
    return [
        'company_id' => \App\Company::all()->random()->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'active' => rand(0,1)
    ];
});
