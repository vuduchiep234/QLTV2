<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:15 PM
 */

namespace App\Decorators\BookHistoryDecorator\ReturnBook;


use App\Decorators\BookHistoryDecorator\EloquentBookHistoryDecorator;
use App\Decorators\BookHistoryDecorator\UpdateHistoryDecorator;
use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdatePositiveStateHandler;
use App\Decorators\Handlers\Book\BookHistory\UpdateHistoryHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Support\Facades\DB;

class ReturnBookDecorator extends UpdateHistoryDecorator
{
    public function arrangedHandler(): Handlerable
    {
        $bookCopyUpdateHandler = new UpdatePositiveStateHandler();
        $bookHistoryUpdateHandler = new UpdateHistoryHandler();

        $bookHistoryUpdateHandler->setNextHandler($bookCopyUpdateHandler);
        return $bookHistoryUpdateHandler;
    }

    public function setHandlerAttribute($history): array
    {
        $handleAttributes['bookCopy'] = $history['bookCopy'];
        $handleAttributes['historyId'] = $history['id'];

        return $handleAttributes;
    }
}