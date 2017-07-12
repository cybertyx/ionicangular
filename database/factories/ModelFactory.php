<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use DeliveryQuick\User;
use DeliveryQuick\Models\Category;
use DeliveryQuick\Models\Client;
use DeliveryQuick\Models\Products;
use DeliveryQuick\Models\Order;
use DeliveryQuick\Models\OrderItem;
use DeliveryQuick\Models\Cupom;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
        'remember_token'    => str_random(10),
    ];
});


$factory->define(Category::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word,
    ];
});

$factory->define(Products::class, function(Faker\Generator $faker){
    return [
        'name'          => $faker->word,
        'description'   => $faker->sentence,
        'price'         => $faker->numberBetween(10, 50),
    ];
});

$factory->define(Client::class, function(Faker\Generator $faker){
    return [
        'phone'     => $faker->phoneNumber,
        'address'   => $faker->address,
        'city'      => $faker->city,
        'state'     => $faker->state,
        'zipcode'   => $faker->postcode,
    ];
});

$factory->define(Order::class, function(Faker\Generator $faker){
    return [
        'client_id'     => rand(1,5),
        'total'      => rand(50, 100),
        'status'     => 0,
    ];
});

$factory->define(OrderItem::class, function(Faker\Generator $faker){
    return [
        
    ];
});

$factory->define(Cupom::class, function(Faker\Generator $faker){
    return [
        'code' => rand('100', 1000),
        'value' => rand(50, 100)
    ];
});
