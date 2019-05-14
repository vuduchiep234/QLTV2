<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:57 PM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


use App\Http\Controllers\Requests\GetRequest;

class BookHistoryGetRequest extends GetRequest
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
        return ['user', 'bookCopy'];
    }
}