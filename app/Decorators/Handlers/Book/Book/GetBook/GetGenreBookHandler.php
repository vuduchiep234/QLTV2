<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:04 PM
 */

namespace App\Decorators\Handlers\Book\Book\GetBook;


use App\Decorators\Handlers\Book\Book\GetBookWithRelatedHandler;

class GetGenreBookHandler extends GetBookWithRelatedHandler
{

    public function setRelations(): array
    {
        return ['images','authors','publisher','bookQuantity'];
    }
}