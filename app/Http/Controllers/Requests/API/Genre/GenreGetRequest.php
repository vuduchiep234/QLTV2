<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:25 PM
 */

namespace App\Http\Controllers\Requests\API\Genre;


use App\Http\Controllers\Requests\GetRequest;

class GenreGetRequest extends GetRequest
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