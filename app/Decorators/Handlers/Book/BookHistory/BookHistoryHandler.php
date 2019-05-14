<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:41 PM
 */

namespace App\Decorators\Handlers\Book\BookHistory;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\BookHistory;
use App\Repositories\Eloquent\EloquentBookHistoryRepository;
use App\Services\Eloquent\EloquentBookHistoryService;
use App\Services\Service;

abstract class BookHistoryHandler extends EloquentBaseHandler
{
    public function createHandlerService(): ?Service
    {
        $bookHistory = new BookHistory();
        $bookHistoryRepository = new EloquentBookHistoryRepository($bookHistory);
        return new EloquentBookHistoryService($bookHistoryRepository);
    }
}