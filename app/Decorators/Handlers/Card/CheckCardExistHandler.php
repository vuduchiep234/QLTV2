<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/20/2019
 * Time: 8:52 PM
 */

namespace App\Decorators\Handlers\Card;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CheckCardExistHandler extends CardHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $pairs = [
            [
                'needle' => 'user_id',
                'value' => $attributes['user_id']
            ]
        ];

        $cardService = $this->createHandlerService();
        $card = $cardService->getBy($pairs);

        if ($card != null) {
            return $this->createHandlerResponse('Card exists!', false);
        }

        return parent::handle($attributes);
    }
}