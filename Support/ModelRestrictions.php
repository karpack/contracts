<?php

namespace Karpack\Contracts\Support;

use Illuminate\Database\Eloquent\Model;

interface ModelRestrictions
{
    /**
     * Performs an auth check to see whether the given `$user` (or authenticated user) has 
     * capabilities to perform the given `$task` on the model. Throws authorization exception 
     * if user is no authority to perform the task
     *   
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string|null $task
     * @param \Illuminate\Database\Eloquent\Model|null $user
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function authorizeUserToPerformTaskOn(Model $model, $task = null, $user = null);

    /**
     * Check whether the given user can perform the given task on the model. If no user
     * is provided, capabilities of authenticated user is put into test. 
     * 
     * A user can access the model, if it belongs to the user itself or if the user has 
     * necessary permission to access it.
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string|null $task
     * @param \Illuminate\Database\Eloquent\Model|null $user
     * @return bool
     */
    public function userCanPerformTaskOn(Model $model, $task = null, $user = null);
}