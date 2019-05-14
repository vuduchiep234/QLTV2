<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 11:05 AM
 */

namespace App\Decorators\Handlers\Book\BookCopy\GetBookCopy;


use App\Decorators\Handlers\Book\BookCopy\BookCopyHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CheckAvailableBookCopyHandler extends BookCopyHandler
{
    private static $ERROR_MESSAGE = 'Invalid input quantity';
    public function handle(array &$attributes): HandlerResponse
    {
        $bookCopyService = $this->createHandlerService();

        //gather get information
        $books = $attributes['books'];

        foreach ($books as $book) {
            $desiredQuantity = $book['quantity'];
            //set up searching information
            $pairs = [
                [
                    'needle' => 'book_id',
                    'value' => $book['book_id']
                ],
                [
                    'needle' => 'state',
                    'value' => true
                ],
            ];

            $availableQuantity = $bookCopyService->count($pairs);

            if ($desiredQuantity > $availableQuantity) {
                return $this->createHandlerResponse(self::$ERROR_MESSAGE, false);
            }
        }

        return parent::handle($attributes);
    }
}