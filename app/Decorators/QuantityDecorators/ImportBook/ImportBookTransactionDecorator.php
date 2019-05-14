<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2019
 * Time: 11:15 PM
 */

namespace App\Decorators\QuantityDecorators\ImportBook;


use App\Decorators\EloquentUpdateTransactionDecorator;
use App\Decorators\Handlers\Book\BookCopy\CreateBookCopyHandler;

class ImportBookTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(ImportBookDecorator $service)
    {
        parent::__construct($service);
    }


    public function attachUpdate(bool $updateChecker, array $attributes, int $id): bool
    {
        if ($updateChecker == true) {
            $bookCopyHandler = new CreateBookCopyHandler();
            $attributes['bookId'] = $id;

            $handlerResult = $bookCopyHandler->handle($attributes);
            if ($handlerResult->getResponseStatus() == true) {
                return true;
            }
            $this->setMessage($handlerResult->getResponseMessage());
            return false;
        }
        return false;
    }
}