<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2019
 * Time: 11:22 PM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Decorators\Handlers\Book\BookQuantity\CreateBookQuantityHandler;
use App\Decorators\Handlers\Image\Create\CreateBookImageHandler;
use App\Decorators\Handlers\Image\Upload\UploadBookImageHandler;
use App\Services\BookService;
use Illuminate\Database\Eloquent\Model;

class CreateBookDecorator extends EloquentCreateTransactionDecorator
{
    public function __construct(BookService $service)
    {
        parent::__construct($service);
    }

    public function attachCreate(Model &$model, $attributes): bool
    {
        if ($model != null) {
            $attributes['bookId'] = $model['id'];
            $createQuantityHandler = new CreateBookQuantityHandler();
            $uploadImageHandler = new UploadBookImageHandler();
            $createBookImageHandler = new CreateBookImageHandler();

            $createQuantityHandler->setNextHandler($uploadImageHandler);
            $uploadImageHandler->setNextHandler($createBookImageHandler);

            $response = $createQuantityHandler->handle($attributes);
            if ($response->getResponseStatus() == true) {
                return true;
            }
            //if related information update activities has errors occurred, roll back database update.
            $model = null;
            $this->setMessage($response->getResponseMessage());
            return false;
        }
        return false;
    }
}