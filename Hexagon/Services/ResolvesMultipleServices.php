<?php

namespace Karpack\Contracts\Hexagon\Services;

interface ResolvesMultipleServices
{
    /**
     * Resolve the service corresponding to the given model.
     * 
     * @return mixed
     */
    public function resolve();

     /**
     * Sets the model for which service has to be resolved.
     * 
     * @param \Illuminate\Database\Eloquent\Model|string $model
     * @return static
     */
    public function setModel($model);

    /**
     * The service that should be returned if nothing was resolved. If no default service 
     * should to be resolved, throw an exception, so that the flow breaks in the calling
     * function.
     * 
     * @return mixed
     * @throws \Throwable
     */
    public function defaultService();
}