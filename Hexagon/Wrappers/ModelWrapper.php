<?php

namespace Karpack\Contracts\Hexagon\Wrappers;

use JsonSerializable;
use Illuminate\Contracts\Support\Arrayable;

interface ModelWrapper extends Arrayable, JsonSerializable
{
    /**
     * Returns the underlying model of the ModelService.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model();
}