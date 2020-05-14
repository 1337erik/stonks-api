<?php

namespace App\Managers;

use App\Intention;
use App\User;

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
     * 
     * @return Collection $intentions
     */
    public function getIntentionsForUser( $user_id )
    {
        return Intention::forUser( $user_id )->get();
    }

    /**
     * Create an intention for a given user
     * 
     * @param App\User $user
     * @param App\Intention $intention
     * 
     * @return Intention $intention
     */
    public function addIntentionForUser( User $user, Intention $intention )
    {
        return $user->intentions()->save( $intention );
    }

    /**
     * Update an intention with new data
     * 
     * @param App\Intention $itention
     * @param array $new_data
     * 
     * @return bool
     */
    public function updateIntention( Intention $intention, array $new_data )
    {
        return $intention->update( $new_data );
    }

    /**
     * Delete an intention
     * 
     * @param App\Intention $itention
     * 
     * @return bool
     */
    public function deleteIntention( Intention $intention )
    {
        return $intention->delete();
    }
}