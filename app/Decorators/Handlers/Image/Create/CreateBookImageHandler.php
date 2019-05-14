<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 8:57 PM
 */

namespace App\Decorators\Handlers\Image\Create;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Decorators\Handlers\Image\EloquentImageHandler;
use App\Services\Message;

class CreateBookImageHandler extends EloquentImageHandler
{
    private static $MISSING_HANDLER = "Missing create book handler";
    private static $MISSING_UPLOAD_HANDLER = "Missing upload image handler";

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('image', $attributes)) {
            return parent::handle($attributes);
        }

        if (!array_key_exists('bookId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_HANDLER, false);
        }

        $imageService = $this->createHandlerService();
        $imageAttribute['imageURL'] = $attributes['image'];
        $imageAttribute['imageName'] = $attributes['name'];
//        $imageAttribute['books'] = $attributes['bookId'];

        $newImage = $imageService->createNewModel($imageAttribute);
        $attributes['images'] = $newImage['id'];
        if ($newImage == null) {
            /**
             * @var Message $imageService
             */
            return $this->createHandlerResponse($imageService->getMessage(), false);
        }

        return parent::handle($attributes);
    }
}
