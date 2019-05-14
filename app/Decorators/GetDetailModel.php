<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:57 PM
 */

namespace App\Decorators;


use App\Decorators\Handlers\Handlerable;
use Illuminate\Database\Eloquent\Model;

trait GetDetailModel
{
    public function getDetailModel(Model $parentModel): ?Model
    {
        $model = $parentModel;
        $books = $model['books'];

        $bookRelated = [];
        $bookHandler = $this->createGetHandler();

        foreach ($books as $book) {
            $bookAttributes['bookId'] = $book['id'];
            $bookAttributes['related'] = null;
            $bookHandler->handle($bookAttributes);
            array_push($bookRelated, $bookAttributes['related']);
        }
        unset($model['books']);
        $model['books'] = $bookRelated;

        return $model;
    }

    abstract public function createGetHandler(): Handlerable;
}