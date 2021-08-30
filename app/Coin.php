<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $guarded = [];
    protected $casts = [

        'usd_value' => 'double'
    ];

    public function farm()
    {
        return $this->hasOne( Farm::class );
    }

    const USDT = 'USDT LP';
    const BSW = 'BSW';
}
