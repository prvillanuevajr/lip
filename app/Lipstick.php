<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lipstick extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function finish()
    {
        return $this->belongsTo(Finish::class);
    }
}
