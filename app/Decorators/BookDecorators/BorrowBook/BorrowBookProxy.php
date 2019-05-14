<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 12:06 AM
 */

namespace App\Decorators\BookDecorators\BorrowBook;


use App\Decorators\EloquentDecorator;
use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\CheckAvailableBookCopyHandler;
use App\Decorators\Handlers\Book\BookHistory\CheckHistoryHandler;
use App\Decorators\Handlers\Card\CheckCardLimitHandler;

class BorrowBookProxy extends EloquentDecorator
{
    public function __construct(BorrowBookDecorator $service)
    {
        parent::__construct($service);
    }

    public function updateModel(array $attributes, $id): bool
    {
        if ($this->checkUpdate($attributes, $id)) {
            return parent::updateModel($attributes, $id);
        }
        return false;
    }

    private function checkUpdate(array &$attributes, $id): bool
    {
        $handleAttributes['userId'] = $id;

        $checkCardHandler = new CheckCardLimitHandler();
        $checkHistoryHandler = new CheckHistoryHandler();
        $checkCopyHandler = new CheckAvailableBookCopyHandler();

        $checkCardHandler->setNextHandler($checkHistoryHandler);
        $checkHistoryHandler->setNextHandler($checkCopyHandler);

        //set up total quantity for checking history


        $handleAttributes['books'] = $attributes['books'];

        $handlerResponse = $checkCardHandler->handle($handleAttributes);

        if ($handlerResponse->getResponseStatus() == true) {
            return true;
        }

        /**
         * @var BorrowBookDecorator $bookDecorator
         */
        $bookDecorator = $this->getService();
        $bookDecorator->setMessage($handlerResponse->getResponseMessage());
        return false;
    }
}