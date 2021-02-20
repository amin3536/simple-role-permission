<?php

namespace Amin3536\SimpleRolePermission\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleRolePermission extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'simple-role-permission';
    }
}
