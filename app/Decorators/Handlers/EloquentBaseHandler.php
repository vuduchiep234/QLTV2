<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:06 PM
 */

namespace App\Decorators\Handlers;


use App\Services\Message;
use App\Services\Service;

abstract class EloquentBaseHandler extends BaseHandler
{
    abstract public function createHandlerService(): ?Service;

    public function getServiceMessage(Service $service) : string
    {
        /**
         * @var Message $service
         */
        return $service->getMessage();
    }
}