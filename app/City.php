<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city_id', 'city_code', 'city_name'];
    
    // シティーから見て一つのカントリー
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
