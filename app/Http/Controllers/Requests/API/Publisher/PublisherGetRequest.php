<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:07 AM
 */

namespace App\Http\Controllers\Requests\API\Publisher;


use App\Http\Controllers\Requests\GetRequest;

class PublisherGetRequest extends GetRequest
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
        return ['books'];
    }
}