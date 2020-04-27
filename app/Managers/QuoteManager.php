<?php

namespace App\Managers;

use App\Quote;

class QuoteManager {

    /**
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Optional to specify a category, return all quotes from the database
     * 
     * @param string $category
     * @return App\Quote $quote
     */
    public function getAllQuotes( $category = null )
    {
        return Quote::when( !empty( $category ), function( $query ) use( $category ){

            $query->where( 'category', '=', $category );
        })->get();
    }

    /**
     * Optional to specify a category, return a random quote from the database
     * 
     * @param string $category
     * @return App\Quote $quote
     */
    public function getRandomQuote( $category = null )
    {
        $quote = Quote::inRandomOrder()
            ->when( !empty( $category ), function( $query ) use( $category ){

                $query->where( 'category', '=', $category );
        })->first();

        return $quote;
    }

    /**
     * Return a random category for quotes
     * 
     * @return string
     */
    public static function getRandomQuoteCategory()
    {
        $quo_cats = Quote::allQuoteCategories();

        $num = mt_rand( 0, count( $quo_cats ) - 1 );
        return $quo_cats[ $num ];
    }
}