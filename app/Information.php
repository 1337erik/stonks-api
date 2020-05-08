<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $guarded = [];

    public function sources()
    {
        return $this->belongsToMany( Source::class, 'information_sources');
    }

    public function category()
    {
        return $this->belongsToMany( Category::class, 'information_categories' );
    }
}
