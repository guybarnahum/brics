<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
    
class BricsIco extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'guid'      ,
        'desc'      ,
        'purpose'   ,

        'status'    ,

        'property_guid'     ,
        'property_valuation',
        'property_valuation_currency',
        'property_valuation_date',

        'ico_total_value'   ,
        'brics_allocated'   ,
        'brics_circulated'  ,
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
