<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/27/2019
 * Time: 9:26 AM
 */

namespace App\Decorators\Handlers\Image\Delete;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Decorators\Handlers\Image\EloquentImageHandler;

class RemoveImageHandler extends EloquentImageHandler
{
    public function handle(array &$attributes): HandlerResponse
    {

        return parent::handle($attributes);
    }
}