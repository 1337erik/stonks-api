<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $guarded = [];

    public function accounts()
    {
        return $this->hasMany( Account::class, 'farm_id', 'id' );
    }
}
