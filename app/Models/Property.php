<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class Property extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'properties';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'guid'      ,
    
        'location_desc' ,
        'country_code'  ,
        'region'    ,
        'city'      ,
        'address'   ,
        'zip'       ,
    
        'built_area',
        'land_area' ,
        'area_unit' ,
    
        'rooms'     ,
        'bed_rooms' ,
        'bath_rooms',
    
        'desc_short',
        'desc_full'
    ];
    
    /**
     * Guid is calculated if not provided
     *
     * @var array
     */

    public function setGuidAttribute($value)
    {
        $this->attributes['guid'] = empty($value)? generate_guid():$value;
    }
}
