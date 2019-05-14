<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 8:08 PM
 */

namespace App\Decorators\Handlers\Image\Upload;


use App\Decorators\Handlers\BaseHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use Illuminate\Http\UploadedFile;

abstract class UploadImageHandler extends BaseHandler
{
    private static $MISSING_IMAGE_ERROR = "Missing image upload";
    private static $UPLOAD_IMAGE_ERROR = "Upload image error";
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('image', $attributes)) {
            return parent::handle($attributes);
        }
        /**
         * @var UploadedFile $file
         */
        $file = $attributes['image'];
        $fileName = $file->getClientOriginalName();
        if ($file->storeAs($this->setStorageURL(), $file->getClientOriginalName()))
        {
            $attributes['name'] = $fileName;
            $attributes['image'] = '/storage' . $this->setImageURL() .'/'. $fileName;
        } else {
            $this->createHandlerResponse(self::$UPLOAD_IMAGE_ERROR, false);
        }

        return parent::handle($attributes);
    }

    abstract public function setStorageURL(): string;

    abstract public function setImageURL(): string ;
}