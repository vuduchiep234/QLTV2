<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:37 PM
 */

namespace App\Decorators\Handlers\Book\BookCopy;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\BookCopy;
use App\Repositories\Eloquent\EloquentBookCopyRepository;
use App\Services\Eloquent\EloquentBookCopyService;
use App\Services\Service;

abstract class BookCopyHandler extends EloquentBaseHandler
{
    public function createHandlerService(): ?Service
    {
        $bookCopy = new BookCopy();
        $bookCopyRepository = new EloquentBookCopyRepository($bookCopy);
        return new EloquentBookCopyService($bookCopyRepository);
    }
}