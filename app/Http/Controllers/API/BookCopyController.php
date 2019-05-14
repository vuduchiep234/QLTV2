<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/21/2019
 * Time: 2:30 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\BookCopy\BookCopyGetRequest;
use App\Services\BookCopyService;

class BookCopyController extends APIController
{
    public function __construct(BookCopyService $service)
    {
        parent::__construct($service);
    }

    public function get(BookCopyGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }
}