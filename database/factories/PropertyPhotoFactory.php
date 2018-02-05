<?php

use Faker\Generator as Faker;

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

$factory->define(\App\Models\PropertyPhoto::class, function (Faker $faker) {
    
    $property  = \App\Property::inRandomOrder()->first();
    $guid      = $property->guid;
    $photo_num = \App\PropertyPhoto::where('property_guid', $guid)->count();
                 
    return [
        'property_guid' => $guid,

        'url'   => $faker->imageUrl(800,600,'nature'),
        'desc'  => $faker->text,
        'order' => $photo_num,
    ];
});
