<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class PropertyAttribute extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property_attributes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'property_guid',
    
        'name'  ,
        'value' ,
        'group' ,
        'order'
    ];
}
