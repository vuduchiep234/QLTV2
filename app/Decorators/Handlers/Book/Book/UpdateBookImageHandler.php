<?php
/**
 * Created by PhpStorm.
 * User: Phí Văn Tuấn
 * Date: 3/5/2019
 * Time: 07:59
 */

namespace App\Decorators\Handlers\Book\Book;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class UpdateBookImageHandler extends BookHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('image', $attributes)) {
            return parent::handle($attributes);
        }
        if (!array_key_exists('bookId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_HANDLER, false);
        }
        $bookService = $this->createHandlerService();
        $bookUpdateAttribute['images'] = $attributes['images'];
        $bookService->updateModel($bookUpdateAttribute, $attributes['bookId']);
        return parent::handle($attributes);
    }
}
