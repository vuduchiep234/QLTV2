<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 2:23 PM
 */

namespace App\Decorators\PublisherDecorators;


use App\Decorators\GetDetailModel;
use App\Decorators\Handlers\Book\Book\GetBook\GetPublisherBookHandler;
use App\Decorators\Handlers\Handlerable;
use Illuminate\Database\Eloquent\Model;

class GetPublisherDecorator extends EloquentPublisherDecorator
{
    use GetDetailModel;
    public function getModel(array $attributes, $id): ?Model
    {
        $publisher = parent::getModel($attributes, $id);
        return $this->getDetailModel($publisher);
    }

    public function createGetHandler(): Handlerable
    {
        return new GetPublisherBookHandler();
    }
}