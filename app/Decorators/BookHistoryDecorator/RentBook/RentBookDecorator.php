<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 2:31 PM
 */

namespace App\Decorators\BookHistoryDecorator\RentBook;


use App\Decorators\BookHistoryDecorator\EloquentBookHistoryDecorator;
use App\Decorators\BookHistoryDecorator\UpdateHistoryDecorator;
use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeState\UpdateRentedStateHandler;
use App\Decorators\Handlers\Handlerable;
use App\Models\BookHistory;
use App\Services\BookHistoryService;
use Illuminate\Support\Facades\DB;

class RentBookDecorator extends UpdateHistoryDecorator
{
    public function arrangedHandler(): Handlerable
    {
        return new UpdateRentedStateHandler();
    }

    public function setHandlerAttribute($history): array
    {
        $handleAttributes['bookCopy'] = $history['bookCopy'];
        return $handleAttributes;
    }
}