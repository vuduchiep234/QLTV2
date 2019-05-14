<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 12:54 AM
 */

namespace App\Decorators\Handlers\Book\BookQuantity;


use App\BookQuantity;
use App\Decorators\Handlers\EloquentBaseHandler;
use App\Repositories\Eloquent\EloquentBookQuantityRepository;
use App\Services\Eloquent\EloquentBookQuantityService;
use App\Services\Service;

class BookQuantityHandler extends EloquentBaseHandler
{

    public function createHandlerService(): ?Service
    {
        $bookQuantity = new BookQuantity();
        $bookQuantityRepository = new EloquentBookQuantityRepository($bookQuantity);
        return new EloquentBookQuantityService($bookQuantityRepository);
    }
}