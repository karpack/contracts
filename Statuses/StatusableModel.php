<?php

namespace Karpack\Contracts\Statuses;

interface StatusableModel
{
    /**
     * Returns all the statuses of this model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses();

    /**
     * Returns an array of status identifiers used by the model
     * 
     * @return array
     */
    public function statusIdentifiers();
}