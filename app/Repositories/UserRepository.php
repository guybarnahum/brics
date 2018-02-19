<?php namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\PropertyAttribute;
use App\Models\User;
use App\Models\BricsIco;
use App\Models\BricsWallet;

class UserRepository {

    public function getUserByGuid( $guid, $where = false )
    {
        if ( empty( $where ) ) $where = [];
        if (!empty( $guid  ) ) $where[ 'guid' ] = $guid;

        $user  = User::where( $where )->first();
        return $user;
    }
}