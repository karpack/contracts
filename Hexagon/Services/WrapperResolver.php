<?php

namespace Karpack\Contracts\Hexagon\Services;

interface WrapperResolver
{
    /**
     * Sets the model wrapper resolver on the service
     * 
     * @param \callable $wrapperResolver
     * @return $this
     */
    public function setWrapperResolver(callable $wrapperResolver);
    
    /**
     * Resolves a new wrapper around the given model.
     * 
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function resolveWrapper($model);
}