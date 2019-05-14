<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 8:21 PM
 */

namespace App\Decorators\Handlers\Image\Upload;


class UploadBookImageHandler extends UploadImageHandler
{
    public function setStorageURL(): string
    {
        return '/public/book';
    }

    public function setImageURL(): string
    {
        return '/book';
    }
}