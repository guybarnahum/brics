<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
    
// use Illuminate\Http\Request;

class PropertyController extends Controller {
    
    public function __construct()
    {
        // $this->middleware('guest');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $properties = \App\Models\Property::all();
        
        foreach( $properties as $property ){
            $photos = \App\Models\PropertyPhoto::where('property_guid', '=', $property->guid)->get();
            $property[ 'photos' ] = $photos;
        }
        return view( 'properties' )->with( 'properties', $properties );
	}
}
