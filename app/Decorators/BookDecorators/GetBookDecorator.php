<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2019
 * Time: 10:45 PM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\Handlers\Book\BookCopy\GetBookCopy\CountAvailableHandler;
use Illuminate\Database\Eloquent\Model;

class GetBookDecorator extends EloquentBookDecorator
{
    public function getModel(array $attributes, $id): ?Model
    {
        $book =  parent::getModel($attributes, $id);
        $bookCopyHandler = new CountAvailableHandler();
        $available = [];
        $available['book'] = $book;
        $bookCopyHandler->handle($available);
        $book['availableQuantity'] = $available['availableQuantity'];
        return $book;
    }
}