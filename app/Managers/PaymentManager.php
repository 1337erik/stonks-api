<?php

namespace App\Managers;

use Laravel\Cashier\Cashier;

class PaymentManager
{

    /**
     * 
     * @return void
     */
    public function __construct()
    {

    }

    public function getOne( $stripeId )
    {
        $user = Cashier::findBillable( $stripeId );
        dd( 'fucckkaa', $user );
    }

    public function getPaginated()
    {
        return 'lol sure';
    }

}