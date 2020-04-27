<?php

namespace App\Http\Controllers;

use App\Managers\QuoteManager;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $quotes = json_encode( $quo->getAllQuotes( Quote::CATEGORY_HERO )->pluck( 'body' ) );
        return view( 'home', compact( 'quotes' ) );
    }
}
