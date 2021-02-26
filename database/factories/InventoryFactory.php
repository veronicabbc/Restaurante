<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Inventory;
use App\OperationType;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(10, 1000),
        'operation_type_id' => OperationType::all()->random(),
        'product_id' => Product::all()->random(),
    ];
});
