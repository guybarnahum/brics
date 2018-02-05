<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class PropertyPhoto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property_photos';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'property_guid',
    
        'url'   ,
        'desc'  ,
        'order'
    ];
}
