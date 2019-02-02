<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function lipstick()
    {
        return $this->belongsTo(Lipstick::class);
    }
}
