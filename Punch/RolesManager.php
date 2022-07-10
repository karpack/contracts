<?php

namespace Karpack\Contracts\Punch;

use Karpack\Contracts\Hexagon\Services\CrudManager;

interface RolesManager extends CrudManager
{
    /**
     * Grants the given permission to the role.
     * 
     * @param \Spatie\Permission\Models\Role|int
     * @param \Karpack\Punch\Models\Permission[]|int
     * @return \Spatie\Permission\Models\Role
     */
    public function assignPermissionsToRole($roleOrId, $permissionsOrId);

    /**
     * Syncs the role with the given `$permissionIds` ie only these permissions will be 
     * assigned to the role.
     * 
     * @param \Spatie\Permission\Models\Role|int
     * @param int|array
     * @return \Spatie\Permission\Models\Role
     */
    public function syncPermissions($roleOrId, $permissionIds);

    /**
     * Revokes the given permission from the given role.
     * 
     * @param \Spatie\Permission\Models\Role|int
     * @param \Karpack\Punch\Models\Permission|int
     * @return \Spatie\Permission\Models\Role
     */
    public function revokePermissionFromRole($roleOrId, $permissionOrId);

    /**
     * Resolves a new handler for the given model.
     * 
     * @param \Spatie\Permission\Models\Role
     * @return \Karpack\Punch\Wrappers\RoleWrapper
     */
    public function resolveWrapper($model);
}