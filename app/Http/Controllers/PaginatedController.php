<?php
/**
 * Created by PhpStorm.
 * User: Phí Văn Tuấn
 * Date: 17/5/2019
 * Time: 16:13
 */

namespace App\Http\Controllers\Requests;


use App\Http\Controllers\Controller;
use App\Services\BookService;

class PaginatedController extends Controller
{
    private $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function getBookPaginatedView()
    {
        $attributes['limit'] = 5;
        $books =  $this->service->paginated($attributes);
        return view('paginatedExample', ['books' => $books]);
    }
}
