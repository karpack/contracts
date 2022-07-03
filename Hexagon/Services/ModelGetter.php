<?php

namespace Karpack\Contracts\Hexagon\Services;

interface ModelGetter
{
    /**
     * Returns a model from the given model id.
     * 
     * @param int|array|\Karpack\Hexagon\Models\Model $id
     * @param bool $fail Set this to false to prevent throwing exception on failure.
     * @return \Illuminate\Support\Collection|\Karpack\Hexagon\Models\Model|null
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getLocked($id, $fail = true);

    /**
     * Returns a model from the given model id.
     * 
     * @param int|array|\Karpack\Hexagon\Models\Model $id
     * @param bool $fail Set this to false to prevent throwing exception on failure.
     * @param bool $lock Set this to lock the row on the table
     * @return \Illuminate\Support\Collection|\Karpack\Hexagon\Models\Model|null
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get($id, $fail = true, $lock = false);

    /**
     * Returns locked model from the given query
     * 
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @param bool $fail
     * @return \Karpack\Hexagon\Models\Model
     */
    public function getLockedFromQuery($query, $fail = true);

    /**
     * Returns model from the given query
     * 
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @param bool $fail
     * @param bool $lock
     * @return \Karpack\Hexagon\Models\Model
     */
    public function getFromQuery($query, $fail = true, $lock = false);

    /**
     * Returns a query object on the underlying repo model. This function allows 
     * us to update the query conditions without overriding the `get` method.
     * 
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function getQuery();
}