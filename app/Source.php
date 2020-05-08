<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $guarded = [];

    public function information()
    {
        return $this->belongsToMany( Source::class, 'information_sources');
    }
}
