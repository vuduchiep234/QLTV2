<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:40 PM
 */

namespace App\Http\Controllers\Requests\API\Book;


use App\Http\Controllers\Requests\GetRequest;

class BookGetRequest extends GetRequest
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
        return ['authors', 'publisher', 'images', 'genres', 'bookCopies'];
    }
}
