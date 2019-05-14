<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 11:43 AM
 */

namespace App\Decorators\Handlers\Book\BookHistory;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CreateBookHistoryHandler extends BookHistoryHandler
{
    private static $USER_ID_ERROR_MESSAGE = 'Missing userId key in handler attributes';
    private static $BOOK_COPY_ID_ERROR_MESSAGE = 'Missing bookCopy key in handler attributes';

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('userId', $attributes)) {
            return $this->createHandlerResponse(self::$USER_ID_ERROR_MESSAGE, false);
        }

        if (!array_key_exists('bookCopy', $attributes)) {
            return $this->createHandlerResponse(self::$BOOK_COPY_ID_ERROR_MESSAGE, false);
        }
        $historyService = $this->createHandlerService();

        //gather input data
        $userId = $attributes['userId'];
        $bookCopy = $attributes['bookCopy'];

        //set up create Data
        $historyAttribute['user_id'] = $userId;
        $historyAttribute['book_copies_id'] = $bookCopy['id'];
        $historyAttribute['state'] = true;

        //create
        $createChecker = $historyService->createNewModel($historyAttribute);

        //return message if error occurs
        if ($createChecker == null) {
            return $this->createHandlerResponse($this->getServiceMessage($historyService), false);
        }

        return parent::handle($attributes);
    }
}