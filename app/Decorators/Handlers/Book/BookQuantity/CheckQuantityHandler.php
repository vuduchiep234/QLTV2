<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 12:53 AM
 */

namespace App\Decorators\Handlers\Book\BookQuantity;


use App\Decorators\Handlers\Book\BookQuantity\BookQuantityHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CheckQuantityHandler extends BookQuantityHandler
{
    private static $ERROR_MESSAGE = 'Invalid input quantity';

    public function handle(array &$attributes): HandlerResponse
    {
        $bookQuantityService = $this->createHandlerService();

        $bookId = $attributes['bookId'];

        $pairs = [
            [
                'needle' => 'book_id',
                'value' => $bookId,
            ]
        ];

        $bookQuantity = $bookQuantityService->getBy($pairs);

        //retrieve book quantity data
        $currentQuantity = $bookQuantity['quantity'];
        $additionQuantity = $attributes['quantity'];

        //check valid quantity
        if ($currentQuantity < $additionQuantity) {
            return $this->createHandlerResponse(self::$ERROR_MESSAGE, false);
        }

        return parent::handle($attributes);
    }
}