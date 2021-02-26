<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bill;
use App\Client;
use App\Inventory;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(0, 50),
        'amount' => $faker->randomFloat(2,1000, 500000),
        'total' => $faker->randomFloat(2,1000, 500000),
        'inventory_id' => Inventory::all()->random(),
        'client_id' => Client::all()->random(),
    ];
});
