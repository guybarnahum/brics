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
    
    public function generateGuid()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');
        
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
    public function setGuidAttribute($value)
    {
        $this->attributes['guid'] = empty($value)? $this->generateGuid():$value;
    }
}
