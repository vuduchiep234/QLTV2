<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/19/2019
 * Time: 9:31 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Role\RoleDeleteRequest;
use App\Http\Controllers\Requests\API\Role\RoleGetRequest;
use App\Http\Controllers\Requests\API\Role\RolePatchRequest;
use App\Http\Controllers\Requests\API\Role\RolePostRequest;
use App\Services\RoleService;

class RoleController extends APIController
{
    public function __construct(RoleService $service)
    {
        parent::__construct($service);
    }

    public function get(RoleGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(RolePostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(RolePatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(RoleDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function all(RoleGetRequest $request)
    {
        return parent::_all($request);
    }
}