<?php


namespace Amin3536\SimpleRolePermission\roleModule;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait CheckRoleAndPermissions
{

    public function haveRoleAndPermission($role, $permission = null)
    {
        if (!is_null($permission)) {
            return $this->checkPermission($this->findRole($role), $permission);
        } else {
            return $this->findRole($role) != null;
        }


    }

    /**
     * @param Role $role
     * @param $permission
     * @return bool
     * @throws \BenSampo\Enum\Exceptions\InvalidEnumKeyException
     */
    public function checkPermission(Role $role, $permission)
    {

        return $role->$permission->hasFlag(Permissions::fromValue($permission));
    }

    /**
     * @param $role
     * @return \App\Models\Role|null
     */
    public function findRole($role)
    {
        return $this->getRoles()->firstWhere('name', $role);
    }

    //todo: overwrite this method for other service and write Json to model adapter

    /**
     * //edit in other  service  library
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $Roles
     */
    public function getRoles(): Collection
    {
        if ($this->Roles) {
            return $this->Roles = $this->roles()->get();
        }
        return $this->Roles;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(role::class);
    }

}
