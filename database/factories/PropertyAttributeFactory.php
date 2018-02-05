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

$factory->define(\App\Models\PropertyAttribute::class, function (Faker $faker) {
    
    $property = App\Property::inRandomOrder()->first();
    $guid     = $property->guid;
    $attr_num = \App\PropertyAttribute::where('property_guid', $guid)->count();
                 
    return [
        'property_guid' => $guid,
                 
        'name'  => $faker->word,
        'value' => $faker->word,
        'group' => $faker->word,
        'order' => $attr_num,
    ];
});
