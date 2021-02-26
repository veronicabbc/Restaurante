<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'description' => $faker->text(100),
        
    ];
});
