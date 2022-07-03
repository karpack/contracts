<?php

namespace Karpack\Contracts\Hexagon\Wrappers;

interface ValidatesModel
{
    /**
     * Returns all the validation rules of a model. The argument `$model` can
     * be used for removing unique constraint checks.
     * 
     * @return array
     */
    public function validationRules($model = null);
}