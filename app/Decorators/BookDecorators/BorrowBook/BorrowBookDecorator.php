<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:21 PM
 */

namespace App\Decorators\BookDecorators\BorrowBook;


use App\Decorators\BookDecorators\EloquentBookDecorator;
use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\GetAvailableBookCopyHandler;
use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeState\UpdateBorrowedStateHandler;
use App\Decorators\Handlers\Book\BookHistory\CreateBookHistoryHandler;
use App\Decorators\Handlers\Handlerable;

class BorrowBookDecorator extends EloquentBookDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $requiredBooks = $attributes['books'];
        $handleAttributes['userId'] = $id;

        //
        foreach ($requiredBooks as $requiredBook) {
            $handleAttributes['bookId'] = $requiredBook['book_id'];
            $handleAttributes['quantity'] = $requiredBook['quantity'];
            $arrangedHandler = $this->arrangeHandler($handleAttributes['quantity']);
            $handlerResponse = $arrangedHandler->handle($handleAttributes);
            if ($handlerResponse->getResponseStatus() == false) {
                return false;
            }
        }
        return true;
    }

    private function arrangeHandler(int $quantity): Handlerable
    {
        $first = null;
        $last = null;

        for ($i = 0; $i < $quantity; $i ++) {
            $newGetCopyHandler = new GetAvailableBookCopyHandler();
            $newUpdateCopyHandler = new UpdateBorrowedStateHandler();
            $newCreateHistoryHandler = new CreateBookHistoryHandler();

            if ($first == null) {
                $first = $newGetCopyHandler;
                $last = $newCreateHistoryHandler;
            }

            if (($last != null) && ($i != 0)) {
                $last->setNextHandler($newGetCopyHandler);
                $last = $newCreateHistoryHandler;
            }

            $newGetCopyHandler->setNextHandler($newUpdateCopyHandler);
            $newUpdateCopyHandler->setNextHandler($newCreateHistoryHandler);
        }
        return $first;
    }
}