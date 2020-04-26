<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $guarded = [];

    const CATEGORY_HERO = 'hero-quotes';
    const CATEGORY_PARAGRAPH = 'paragraph';

    /**
     * Return the foundational seed categories that quotes can belong to
     * 
     * @return array
     */
    public static function allQuoteCategories()
    {
        return [
            self::CATEGORY_HERO,
            self::CATEGORY_PARAGRAPH
        ];
    }

    /**
     * Will give you the route resource-controller 
     * path for the current object
     * 
     * @return string
     */
    public function path()
    {
        return "/quote/{$this->id}";
    }









    // Misc ////////////////////////////////////////

    const HERO_QUOTES = [

        'You were born for growth',
        'You are where you\'re aiming',
        'Be the driver of your life',
        'Re-learn living'
    ];
}
