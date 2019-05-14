<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 2:46 PM
 */

namespace App\Decorators\Handlers\Book\BookQuantity;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CreateBookQuantityHandler extends BookQuantityHandler
{
    private static $ERROR_MESSAGE = 'Missing bookId key in input attributes';
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('bookId', $attributes)) {
            return $this->createHandlerResponse(self::$ERROR_MESSAGE, false);
        }
        //gather information
        $bookId = $attributes['bookId'];

        //set up create data
        $quantityService = $this->createHandlerService();

        $quantityAttributes['book_id'] = $bookId;
        $quantityAttributes['quantity'] = 0;

        //create
        $createChecker = $quantityService->createNewModel($quantityAttributes);

        //return message if error occurs
        if ($createChecker == null) {
            return $this->createHandlerResponse($this->getServiceMessage($quantityService), false);
        }

        return parent::handle($attributes);
    }
}