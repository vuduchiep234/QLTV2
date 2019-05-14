<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 11:03 AM
 */

namespace App\Decorators\Handlers\Book\Book;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\Book;
use App\Repositories\Eloquent\EloquentBookRepository;
use App\Services\Eloquent\EloquentBookService;
use App\Services\Service;

class BookHandler extends EloquentBaseHandler
{
    public function createHandlerService(): ?Service
    {
        $book = new Book();
        $repository = new EloquentBookRepository($book);
        return new EloquentBookService($repository);
    }
}