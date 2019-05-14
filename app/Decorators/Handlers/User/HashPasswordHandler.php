<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2019
 * Time: 9:52 PM
 */

namespace App\Decorators\Handlers\User;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class HashPasswordHandler extends UserHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        //tuan aaa
        $password = $attributes['password'];
        $attributes['password'] = hash('md5', $password);
        return parent::handle($attributes);
    }
}