<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsToMany( Category::class, 'parent_categories', 'child_category_id' );
    }

    public function children()
    {
        return $this->belongsToMany( Category::class, 'parent_categories', 'parent_category_id' );
    }

    public function information()
    {
        return $this->belongsToMany( Information::class, 'information_categories' );
    }
}
