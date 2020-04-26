<?php

namespace App\Http\Controllers;

use App\Managers\QuoteManager;
use App\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( QuoteManager $quo )
    {
        $quote = $quo->getRandomQuote();
        return view( 'home', compact( 'quote' ) );
    }
}
