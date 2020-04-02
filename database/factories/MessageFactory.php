<?php
declare(strict_types = 1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Message::class, static function (Faker $faker) {
    return [
        'subject' => $faker->sentence(),
        'message' => $faker->text()
    ];
});

$factory->define(Schedule::class, static function (Faker $faker) {
    return [
        'time' => $faker->randomElement(['12:00', '13:02', '15:00', '17:00', '20:00', '21:06']),
    ];
});
