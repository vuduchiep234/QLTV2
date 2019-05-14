<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 1:42 PM
 */

namespace App\Decorators\Handlers\Book\BookHistory;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CheckHistoryHandler extends BookHistoryHandler
{
    private static $MISSING_USER_ID_ERROR_MESSAGE = 'Missing userId key in handler attributes';
    private static $MISSING_BOOKS_ERROR_MESSAGE = 'Missing books key in handler attributes';
    private static $INVALID_QUANTITY_ERROR_MESSAGE = 'Invalid input quantity';
    private static $ALLOWED_BORROW_NUMBER = 5;

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('userId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_USER_ID_ERROR_MESSAGE, false);
        }

        if (!array_key_exists('books', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_BOOKS_ERROR_MESSAGE, false);
        }

        //count desirable
        $requiredBooks = $attributes['books'];
        $desirableQuantity = 0;
        foreach ($requiredBooks as $requiredBook) {
            $desirableQuantity += $requiredBook['quantity'];

        }

        //count existing
        $historyService = $this->createHandlerService();
        //gather information
        $userId = $attributes['userId'];
        //set up for searching
        $pairs = [
            [
                'needle' => 'state',
                'value' => 'true'
            ],
            [
                'needle' => 'user_id',
                'value' => $userId
            ],
        ];
        $currentBorrow = $historyService->count($pairs);

        // terminate if input borrow number comes over allowing number
        if ($desirableQuantity + $currentBorrow > self::$ALLOWED_BORROW_NUMBER) {
            return $this->createHandlerResponse(self::$INVALID_QUANTITY_ERROR_MESSAGE, false);
        }

        return parent::handle($attributes);
    }
}