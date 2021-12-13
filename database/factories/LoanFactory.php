<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween($min = 5000, $max = 100000), 
        'duration' => $faker->numberBetween($min = 1, $max = 6), 
        'repayment_freq' => 'Monthly', 
        'interest_rate' => $faker->randomFloat(2, 1.5, 4)
    ];
});
