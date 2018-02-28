<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth;
use JWTAuthException;

use App\Repositories\UserRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\BricsWalletRepository;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

        $this->dbUser     = new UserRepository;
        $this->dbProperty = new PropertyRepository;
        $this->dbWallet   = new BricsWalletRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // .............................................................. get routes

    public function get( Request $request, $what )
    {
        $res = [];
        
        $where = $request->all();
        $user  = JWTAuth::parseToken()->authenticate();
        $guid  = isset($user->guid)? $user->guid: false;
        
        switch( $what ){
        case 'user'     : $res = $this->getUser    ( $where, $guid ); break;
        case 'property' : $res = $this->getProperty( $where, $guid ); break;
        case 'wallet'   : $res = $this->getWallet  ( $where, $guid ); break;

        default         : $res['response'] = 'error';
                          $res['message' ] = 'invalid get request ('.$what.')';
                          break;
        }

        if ( !isset($res['response']) ){ $res['response'] = 'success'; }
        
        $json = json_encode( $res );
        return $json;
    }

    public function getUser( $where = false, $user_guid )
    {
        $where[ 'guid' ] = $user_guid;
        
        $users = $this->dbUser->getUser( $where );
        
        $res = ['args'   => [ 'where' => $where  ],
                'result' => $users                ];
    
        return $res;
    }

    public function getProperty( $where = false, $user_guid )
    {
        if (!isset($where[ 'user_guid' ])){
                   $where[ 'user_guid' ] = $user_guid;
        }
        
        $properties = $this->dbProperty->getProperty( $where );

        $res = ['args'   => [ 'where' => $where ],
                'result' => $properties          ];
        
        return $res;
    }

    public function getWallet( $where = false, $user_guid )
    {
        $where[ 'user_guid' ] = $user_guid;
        
        $wallets = $this->dbWallet->getWallet( $where );
        
        $res = ['args'   => [ 'where' => $where ],
                'result' => $wallets             ];
        
        return $res;
    }
}
