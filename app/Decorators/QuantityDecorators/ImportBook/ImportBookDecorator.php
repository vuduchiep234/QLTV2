<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 5:36 PM
 */

namespace App\Decorators\QuantityDecorators\ImportBook;


use App\Decorators\Handlers\Book\BookCopy\CreateBookCopyHandler;
use App\Decorators\Handlers\Book\BookQuantity\UpdateQuantity\IncreaseQuantityHandler;
use App\Decorators\QuantityDecorators\EloquentQuantityDecorator;
use App\Services\BookQuantityService;

class ImportBookDecorator extends EloquentQuantityDecorator
{
    public function __construct(BookQuantityService $service)
    {
        parent::__construct($service);
    }

    public function updateModel(array $attributes, $id): bool
    {
        $quantityHandler = new IncreaseQuantityHandler();
        $attributes['bookId'] = $id;

        $handlerResult = $quantityHandler->handle($attributes);
        if ($handlerResult->getResponseStatus() == false) {
            $this->setMessage($handlerResult->getResponseMessage());
            return false;
        }
        return true;
    }
}