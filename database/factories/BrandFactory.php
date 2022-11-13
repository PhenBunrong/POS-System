<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker){
    return [
        'name'  => $faker->name,
        'image'  => $faker->image('public/storage/brands',640,480, null, false),
        'status' => '1',
    ];
});