<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class BricsWallet extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'guid'      ,
        'user_guid' ,
        'ico_guid'  ,
    
        'brics'     ,
        'cost_basis',
        'cost_currency',
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
