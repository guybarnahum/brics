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

$factory->define(\App\Models\Property::class, function (Faker $faker) {
    
    $bed_rooms  = $faker->numberBetween(1,6);
    $min_bath_rooms = max( 1, $bed_rooms / 2 );
    $bath_rooms = $faker->numberBetween($min_bath_rooms,$bed_rooms);
           
    $desc_short = $faker->text;
    $desc_full  = $desc_short . $faker->text;
                 
    return [
        'guid'          => 0,
        'location_desc' => $faker->address,
        'country_code'  => $faker->country,
        'region'        => $faker->state,
        'city'          => $faker->city,
        'address'       => $faker->streetAddress,
        'zip'           => $faker->postcode,

        'built_area'    => $faker->numberBetween( 80.0,250.0),
        'land_area'     => $faker->numberBetween(100.0,600.0),
        'area_unit'     => 'sqm',

        'rooms'         => $bed_rooms + $bath_rooms,
        'bed_rooms'     => $bed_rooms ,
        'bath_rooms'    => $bath_rooms,

        'desc_short'    => $desc_short,
        'desc_full'     => $desc_full ,
    ];
});
