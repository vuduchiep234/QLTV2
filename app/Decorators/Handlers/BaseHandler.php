<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 10:28 AM
 */

namespace App\Decorators\Handlers;


use App\Decorators\Handlers\HandlerResponseCreators\CreateHandlerResponse;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class BaseHandler implements Handlerable
{
    use CreateHandlerResponse;

    private static $MESSAGE = 'Success';

    /**
     * @var Handlerable $handler
     */
    private $nextHandler;

    public function setNextHandler(Handlerable &$handler = null)
    {
        $this->nextHandler = $handler;
    }

    public function handle(array &$attributes) : HandlerResponse
    {
        if ($this->nextHandler != null) {
            return $this->nextHandler->handle($attributes);
        } else {
            return $this->createHandlerResponse(self::$MESSAGE, true);
        }
    }

    public function getNextHandler(): ?Handlerable
    {
        return $this->nextHandler;
    }
}