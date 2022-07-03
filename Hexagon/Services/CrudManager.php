<?php

namespace Karpack\Contracts\Hexagon\Services;

use Karpack\Contracts\Support\Bootable;

interface CrudManager extends ModelGetter, WrapperResolver, Bootable
{
    /**
     * Creates a new model from the given data, stores it into the database and returns
     * the same.
     * 
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data);

    /**
     * Updates the details of the given model with the given data and returns the same
     * model.
     * 
     * @param \Illuminate\Database\Eloquent\Model|int $modelOrId
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($modelOrId, array $data);

    /**
     * Patches the details of the given model with the given data and returns the same
     * model.
     * 
     * @param \Illuminate\Database\Eloquent\Model|int $modelOrId
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function patch($modelOrId, array $data);

    /**
     * Deletes the given model from the database.
     * 
     * @param \Illuminate\Database\Eloquent\Model|int $modelOrId
     * @return bool|null
     */
    public function delete($modelOrId);

    /**
     * Resolves a new wrapper for the given model.
     * 
     * @param \Illuminate\Database\Eloquent\Model
     * @return \Karpack\Contracts\Hexagon\Wrappers\Updateable
     */
    public function resolveWrapper($model);
}