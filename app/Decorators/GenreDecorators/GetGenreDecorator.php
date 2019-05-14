<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 10:44 AM
 */

namespace App\Decorators\GenreDecorators;


use App\Decorators\GetDetailModel;
use App\Decorators\Handlers\Book\Book\GetBook\GetGenreBookHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Database\Eloquent\Model;

class GetGenreDecorator extends EloquentGenreDecorator
{
    use GetDetailModel;
    public function getModel(array $attributes, $id): ?Model
    {
        $genre = parent::getModel($attributes, $id);
        return $this->getDetailModel($genre);
    }

    public function createGetHandler(): Handlerable
    {
        return new GetGenreBookHandler();
    }
}