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

$factory->define(\App\Models\BricsWallet::class, function (Faker $faker) {
    
    $user = App\Models\User::inRandomOrder()->first();
    $user_guid = $user->guid;

    // pick an active ico
    $ico = App\Models\BricsIco::inRandomOrder()
            ->where('status','=','active')
            ->first();

    if (empty($ico)) return null;

    $ico_guid             = $ico->guid;
    $ico_brics_allocated  = $ico->brics_allocated;
    $ico_brics_circulated = $ico->brics_circulated;

    $brics_left= $ico->brics_allocated - $ico->brics_circulated  ;
    $brics_min = $brics_left/10 ;
    $brics_max = $brics_left    ;

    $brics      = $faker->numberBetween( $brics_min, $brics_max ) ;
    $cost_basis = ($ico->property_valuation * $brics ) / $ico->brics_allocated;
    $brics_left = $brics_left - $brics;
    $status     = ($brics_left > 0 )? 'active' : 'closed';

    App\Models\BricsIco::where( 'guid', '=', $ico_guid )->update(
            [ 'brics_circulated' => $ico_brics_allocated - $brics_left ,
              'status'           => $status                          ]
            );

    $ico_brics_currency = $ico->property_valuation_currency;

    return [
        'guid'          => 0,
        'user_guid'     => $user_guid,
        'ico_guid'      => $ico_guid,

        'brics'         => $brics,
        'cost_basis'    => $cost_basis   ,
        'cost_currency' => $ico_brics_currency,
    ];
});
