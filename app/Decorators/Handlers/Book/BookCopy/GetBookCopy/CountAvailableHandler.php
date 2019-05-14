<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2019
 * Time: 10:33 PM
 */

namespace App\Decorators\Handlers\Book\BookCopy\GetBookCopy;


use App\Decorators\Handlers\Book\BookCopy\BookCopyHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CountAvailableHandler extends BookCopyHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        //check
        $bookCopyService = $this->createHandlerService();
        $book = $attributes['book'];
        $pairs = [
            [
                'needle' => 'book_id',
                'value' => $book['id']
            ],
            [
                'needle' => 'state',
                'value' => true
            ],
        ];

        $attributes['availableQuantity'] = $bookCopyService->count($pairs);

        return parent::handle($attributes);
    }
}