<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'Md. Deloar Hossain',
        'email' => 'deloar@gmail.com',
        'password' => Hash:::make('admin1234'), // password
        
    ];
});
