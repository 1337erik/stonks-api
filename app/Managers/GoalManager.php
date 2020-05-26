<?php

namespace App\Managers;

use App\Goal;
use App\User;

class GoalManager {

    /**
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Fetch all goals for a given user
     * 
     * @param App\User $user
     * 
     * @return Collection $goals
     */
    public function getGoalsForUser( $user_id )
    {
        return Goal::forUser( $user_id )->get();
    }

    /**
     * Create an goal for a given user
     * 
     * @param App\User $user
     * @param App\Goal $goal
     * 
     * @return Goal $goal
     */
    public function addGoalForUser( User $user, Goal $goal )
    {
        return $user->goals()->save( $goal );
    }

    /**
     * Update an goal with new data
     * 
     * @param App\Goal $itention
     * @param array $new_data
     * 
     * @return bool
     */
    public function updateGoal( Goal $goal, array $new_data )
    {
        return $goal->update( $new_data );
    }

    /**
     * Delete an goal
     * 
     * @param App\Goal $itention
     * 
     * @return bool
     */
    public function deleteGoal( Goal $goal )
    {
        return $goal->delete();
    }
}