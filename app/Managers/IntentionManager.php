<?php

namespace App\Managers;

use App\Intention;

class IntentionManager {

    /**
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Fetch all intentions for a given user
     * 
     * @param App\User $user
     */
    public function getIntentionsForUser( $user_id )
    {
        return Intention::forUser( $user_id )->get();
    }
}