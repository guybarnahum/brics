<?php namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\PropertyAttribute;
use App\Models\BricsIco;

class PropertyRepository {
    
    public function getProperty( $where = false )
    {
        if ( empty( $where ) ) $where = [];
        
        $where_property = model_attaributes( '\App\Models\Property', $where );
        
        $properties  = Property::where( $where_property )->get();
        
        foreach( $properties as &$property ){
            $guid   = $property[ 'guid' ];
            $where  =  [ 'property_guid' => $guid ];
            // photos
            $photos = PropertyPhoto::where( $where )->get();
            $property[ 'photos' ] = $photos;
            
            // attributes
            $attributes = PropertyAttribute::where( $where )->get();
            $property[ 'attributes' ] = $attributes;
            
            // ico
            $icos = BricsIco::where( $where )->get();
            $property[ 'icos' ] = $icos;
        }
        
        return $properties;
    }
}
