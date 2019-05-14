<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2019
 * Time: 10:45 PM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\CountAvailableHandler;

class GetAllBookDecorator extends EloquentBookDecorator
{
    public function getAll(array $attributes = [])
    {
        //comment
        $books = parent::getAll($attributes);
        $bookCopyHandler = new CountAvailableHandler();
        $returnBookInfo = [];
        $available = [];
        foreach ($books as &$book) {
            $available['book'] = $book;
            $bookCopyHandler->handle($available);
            $book = $available;
            array_push($returnBookInfo, $available);
        }
        return $returnBookInfo;
    }
}