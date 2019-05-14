<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 10:10 AM
 */

namespace App\Decorators\Handlers\Book\BookCopy\GetBookCopy;


use App\Decorators\Handlers\Book\BookCopy\BookCopyHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Services\BookCopyService;

class GetAvailableBookCopyHandler extends BookCopyHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        /**
         * @var BookCopyService $bookCopyService
         */
        $bookCopyService = $this->createHandlerService();

        //gather get information
        $bookId = $attributes['bookId'];

        //set up searching information
        $pairs = [
            [
                'needle' => 'book_id',
                'value' => $bookId
            ],
            [
                'needle' => 'state',
                'value' => true
            ],
        ];

        $bookCopy = $bookCopyService->getFirst($pairs);

        $attributes['bookCopy'] = $bookCopy;

        return parent::handle($attributes);
    }
}