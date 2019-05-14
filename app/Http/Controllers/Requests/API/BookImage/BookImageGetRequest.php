<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:11 AM
 */

namespace App\Http\Controllers\Requests\API\BookImage;


use App\Http\Controllers\Requests\GetRequest;

class BookImageGetRequest extends GetRequest
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
        return ['book', 'image'];
    }
}