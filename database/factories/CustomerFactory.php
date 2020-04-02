<?php
declare(strict_types = 1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(
    Customer::class,
    static function (Faker $faker) {
        return [
            'first_name' => $faker->firstName,
            'last_name'  => $faker->lastName,
            'email'      => $faker->unique()->safeEmail,
            'timezone'   => $faker->timezone,
        ];
    }
);
