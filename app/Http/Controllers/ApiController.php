<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Repositories\UserRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->dbUser     = new UserRepository;
        $this->dbProperty = new PropertyRepository;
        $this->dbBricsIco = new BricsIcoRepository;
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

    public function get( $what, $guid = false, $filter = false )
    {
        if ( empty( $filter ) ) $fliter = false;
        $res = [];

        switch( $what ){
            case 'user'     : if ( empty($guid) || ($guid == 'me') ){
                                $guid = Session::get( 'guid' );
                              }
                              $res = $this->getUser    ( $guid, $filter );
                              break;

            case 'property' : $res = $this->getProperty( $guid, $filter );
                              break;

            case 'ico'      :
            case 'bricsIco' : $res = $this->getBricsIco( $guid, $filter );
                              break;

            default         : $res['status'] = 'error';
                              $res['msg'   ] = 'invalid get request ('.$what.')';
                              break;
        }

        if ( !isset($res['status']) ){
                    $res['status'] = 'ok';
        }

        $json = json_encode( $res );
        return $json;
    }

    public function getActive( $what )
    {
        return $this->get( $what, $guid = false );
    }

    public function getUser( $guid = false, $filter = false )
    {
        $res = ['status' => 'error'         ,
                'msg'    => 'getUser::unimplemented' ];

        return $res;
    }

    public function getProperty( $guid = false, $filter = false )
    {
        $res = ['status' => 'error'         ,
                'msg'    => 'getProperty::unimplemented' ];

        return $res;
    }

    public function getBricsIco( $guid = false, $filter = false )
    {
        $res = ['status' => 'error'         ,
                'msg'    => 'getBricsIco::unimplemented' ];

        return $res;
    }
}
