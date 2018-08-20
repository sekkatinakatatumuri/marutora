<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['country_name', 'currency_code', 'img_path'];
    
    // カントリーから見て複数のシティ
    public function cities()
    {
        return $this->hasMany(City::class);
    }  
}
