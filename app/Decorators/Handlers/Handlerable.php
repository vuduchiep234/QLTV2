<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 10:26 AM
 */

namespace App\Decorators\Handlers;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

interface Handlerable
{
    public function setNextHandler(Handlerable &$handler = null);

    public function handle(array &$attributes): HandlerResponse;

    public function getNextHandler(): ?Handlerable;
}