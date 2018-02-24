<?php namespace App\Repositories;

use App\Models\User;

class UserRepository {

    public function getUser( $where = false )
    {
        if ( empty( $where ) ) $where = [];
 
        $where_user = model_attaributes( '\App\Models\User', $where );
        
        $users  = User::where( $where_user )->get();
        
        return $users;
    }
}
