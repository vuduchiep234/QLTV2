<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 12:58 AM
 */

namespace App\Decorators\Handlers\Card;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Services\Message;

class CreateCardHandler extends CardHandler
{
    private static $MISSING_USER_ID = 'Missing user id to create card';
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('userId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_USER_ID, false);
        }
        $cardAttributes['user_id'] = $attributes['userId'];
        $cardAttributes['created_at'] = date('Y-m-d h:i:s', time());
        $cardAttributes['updated_at'] = date('Y-m-d h:i:s', time());

        $cardService = $this->createHandlerService();
        $card = $cardService->createNewModel($cardAttributes);
        if ($card == null) {
            /**
             * @var Message $cardService
             */
            return $this->createHandlerResponse($cardService->getMessage(), false);
        }

        return parent::handle($attributes);
    }
}