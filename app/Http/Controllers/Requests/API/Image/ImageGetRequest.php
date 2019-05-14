<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:19 AM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\GetRequest;

class ImageGetRequest extends GetRequest
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
        return ['bookImage'];
    }
}