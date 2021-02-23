# SimpleRolePermission

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

simple permission and rule  for [laravel-api-provider][link-laravel-api-provider] 


this package is under develop and it has not simple usage for now :) 
help me to develop this package or wait for it  ;)
## Installation

Via Composer

``` bash
$ composer require amin3536/simple-role-permission
```

## Usage
#### init
add ```use CheckRoleAndPermissions:``` to your model 
```php
<?php
class Admin extends Authenticatable
{
    use HasFactory ,Notifiable ,HasApiTokens,CheckRoleAndPermissions;
    //....
    }
```
##### middleware 
add middleware in ``app/Http/Kernel.php``
```php
<?php
protected $routeMiddleware = [
    // ...

    'role_and_permission' => \Amin3536\SimpleRolePermission\roleModule\RoleAndPermissionMiddleware::class,
];
```
simple usage middleware
```php

<?php 
Route::group(['middleware' => ['role_and_permission:role_name|permission']], function () {
    //
});
Route::group(['middleware' => ['role_and_permission:owner|'.\Amin3536\SimpleRolePermission\roleModule\Permissions::Editor]], function () {
    //
});
Route::group(['middleware' => ['role_and_permission:videos_admin|'.\Amin3536\SimpleRolePermission\roleModule\Permissions::Creator]], function () {
    //
});
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## to do list
- [ ] support in client and service side ( micro service )
- [ ] add migration in library 
- [ ] auto add middleware 
- [ ] polymorphic relations  different user model and rules  
- [ ] add test
- [ ] add CI style and CI 
- [ ] add document
 
## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/amin3536/simple-role-permission.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/amin3536/simple-role-permission.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/amin3536/simple-role-permission/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/amin3536/simple-role-permission
[link-downloads]: https://packagist.org/packages/amin3536/simple-role-permission
[link-travis]: https://travis-ci.org/amin3536/simple-role-permission
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/amin3536
[link-contributors]: ../../contributors
[link-laravel-api-provider]: https://github.com/amin3536/laravel-API-UserProvider

