<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:10 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\GetRequest;

class UserGetRequest extends GetRequest
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
        return ['role'];
    }
}