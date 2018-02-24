<?php namespace App\Repositories;

use App\Models\BricsIco;
use App\Models\BricsWallet;
        
class BricsWalletRepository {
    
    public function getWallet( $where = false )
    {
        if ( empty( $where ) ) $where = [];
        
        $where_wallet = model_attaributes( '\App\Models\BricsWallet', $where );
        
        $wallets = BricsWallet::where( $where_wallet )->get();

        foreach( $wallets as &$wallet ){
            
            $ico_guid = $wallet[ 'ico_guid' ];
            $where  =  [ 'guid' => $ico_guid ];
            
            // ico
            $ico = BricsIco::where( $where )->first();
            $wallet[ 'ico' ] = $ico;
        }
        
        return $wallets;
    }
}
