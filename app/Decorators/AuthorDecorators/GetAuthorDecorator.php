<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:54 PM
 */

namespace App\Decorators\AuthorDecorators;


use App\Decorators\GetDetailModel;
use App\Decorators\Handlers\Book\Book\GetBook\GetAuthorBookHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Database\Eloquent\Model;

class GetAuthorDecorator extends EloquentAuthorDecorator
{
    use GetDetailModel;
    public function getModel(array $attributes, $id): ?Model
    {
        $author = parent::getModel($attributes, $id);
        return $this->getDetailModel($author);
    }

    public function createGetHandler(): Handlerable
    {
        return new GetAuthorBookHandler();
    }
}