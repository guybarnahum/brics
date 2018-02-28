<?php namespace App\Repositories;

use App\Models\User;
use App\Models\Property;
use App\Models\BricsIco;
use App\Models\BricsWallet;
    
class UserRepository {

    public function getUser( $where = false )
    {
        if ( empty( $where ) ) $where = [];
 
        if ( isset( $where[ 'user_guid' ] ) ){
                    $where[ 'guid' ] = $where[ 'user_guid' ];
        }

        $where_user = model_attaributes( '\App\Models\User', $where );
        
        // user brics wallets
        $users  = User::where( $where_user )->get();
        $icos   = [];
        $properties = [];
        
        foreach( $users as &$user ){
            
            // wallet
            $where_user = [ 'user_guid' => $user->guid ];
            $wallets  = BricsWallet::where( $where_user )->get();
            
            foreach( $wallets as $wallet ){
                
                // wallet ico
                $guid      = $wallet->ico_guid;
                $where_ico = [ 'guid' => $guid ];
                $ico       = BricsIco::where( $where_ico )->first();
                $icos[ $guid ] = $ico;
                
                // wallet ico property
                $guid      = $ico->property_guid;
                $where_ico = [ 'guid' => $guid ];
                $properties[ $guid ] = Property::where( $where_ico )->first();
            }
            
            $user[ 'wallets'    ] = $wallets;
            $user[ 'icos'       ] = $icos;
            $user[ 'properties' ] = $properties;
        }
        
        return $users;
    }
}
