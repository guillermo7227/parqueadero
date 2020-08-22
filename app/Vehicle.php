<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function getNameAttribute()
    {
        return $this->brand->name.' '.$this->year;
    }
}
