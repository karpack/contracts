<?php

namespace Karpack\Contracts\Punch;

use Karpack\Contracts\Hexagon\Services\CrudManager;

interface PermissionsManager extends CrudManager
{
    /**
     * Resolves a new handler for the given model.
     * 
     * @param \Illuminate\Database\Eloquent\Model
     * @return \Karpack\Punch\Wrappers\PermissionWrapper
     */
    public function resolveWrapper($model);
}