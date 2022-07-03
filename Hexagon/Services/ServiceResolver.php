<?php

namespace Karpack\Contracts\Hexagon\Services;

interface ServiceResolver
{
    /**
     * Registers a service to the given model.
     * 
     * @param \Illuminate\Database\Eloquent\Model|string $model
     * @param string $service
     */
    public function register($model, string $service);

    /**
     * Returns the service that is tied to the given model.
     * 
     * @param \Illuminate\Database\Eloquent\Model|string $model
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function resolve($model);
}