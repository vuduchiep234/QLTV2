<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:20 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\GetRequest;

class RoleGetRequest extends GetRequest
{

    function filterRules(): array
    {
        return [];
    }

    function sort(): array
    {
        return ['id'];
    }

    function relations(): array
    {
        return ['users'];
    }
}