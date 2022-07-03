<?php

namespace Karpack\Contracts\Statuses;

use Illuminate\Support\Collection;

interface StatusesManager
{
    /**
     * Returns all the statuses of the given $className. If no $className is provided, we'll
     * return all the statuses.
     * 
     * @param string|\Illuminate\Database\Eloquent\Model|null $className
     * @return \Illuminate\Support\Collection<\Karpack\Statusable\Models\Status>
     */
    public function retrieve($className = null);

    /**
     * Returns all the registered status on the application
     * 
     * @param \Illuminate\Support\Collection $request
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function all(Collection $request, $perPage = 25);

    /**
     * Updates the translations of the given status with the given data and returns the same
     * model.
     * 
     * @param int $statusId
     * @param array $data
     * @return \Karpack\Statusable\Models\Status
     */
    public function update($statusId, array $data);

    /**
     * Loads all the registered statuses. We can't actually cache them, because of the need
     * to fetch the status translation based on the request locale. Instead we cache them
     * locally on the service, so that only one call is made throughout the lifecyle of request
     * 
     * @return \Illuminate\Support\Collection
     */
    public function loadAllStatuses();

    /**
     * Finds the status model of the given query with the translations of the current request.
     * The flag `$useCache` can be set to false to load the status directly from the database
     * which is not required most of the time as the status will be already loaded somewhere
     * in the application, if not, we will load and cache it which will be useful for subsequent
     * requests.
     * 
     * @param int $statusId
     * @param bool|null $useCache
     * @return \Karpack\Statusable\Models\Status|null
     */
    public function find($statusId, $useCache = null);

    /**
     * This function loads all the status ids registered in the application. The result is
     * locally cached and also cached at the application cache store. The parameter $reload
     * is used to trigger a fetch from database.
     * 
     * Caching the status id comes in handy as it is used throughout the application and a 
     * single request might need multiple status ids.
     * 
     * The returned collection is a collection of arrays with `id`, `statusable_type` and
     * `identifier` as the only fields in each one of the item.
     * 
     * @param bool|null $reload
     * @return \Illuminate\Support\Collection
     */
    public function loadStatusIds($reload = null);

    /**
     * Returns the status id of the given model and identifier. If the given status
     * does not exists for the model, we will try to create a new one and use the newly
     * created id.
     * 
     * @param string|\Illuminate\Database\Eloquent\Model $className
     * @param string $statusIdentifier
     * @return int
     */
    public function statusIdOf($className, $statusIdentifier);

    /**
     * Creates the missing statuses for the models defined in the `modelsWithStatus` property
     * 
     * @return void
     */
    public function createRegisteredModelStatuses();

    /**
     * Register models with statuses. This function comes in handy to load models from different 
     * service providers or packages. Since the `modelsWithStatus` will be used mainly to load the 
     * statuses at the time of deployment using `status:load` command, it is necessary that the 
     * service providers using this function are non-deferred. Deferred services won't be booted 
     * automatically and hence the models won't be registered here at the time of loading the 
     * command.
     * 
     * Either use non-deferred service provider or register model on the StatusServiceProvider.
     * 
     * @param \Illuminate\Database\Eloquent\Model|string
     */
    public function registerModelWithStatus($model);

    /**
     * Returns all the models registered on the service that has statuses
     * 
     * @return array
     */
    public function registeredModels();
}