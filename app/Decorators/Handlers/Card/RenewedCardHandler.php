<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:16 AM
 */

namespace App\Decorators\Handlers\Card;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Services\Message;

class RenewedCardHandler extends CardHandler
{
    private static $MISSING_USER_ID = "Missing card id";
    private static $NO_CARD = "User has no card";

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('userId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_USER_ID, false);
        }

        $pairs = [
            [
                'needle' => 'id',
                'value' => $attributes['cardId']
            ]
        ];

        $cardService = $this->createHandlerService();
        $card = $cardService->getBy($pairs);

        if ($card == null) {
            return $this->createHandlerResponse(self::$NO_CARD, false);
        }

        $cardService = $this->createHandlerService();
        $cardAttributes['updated_at'] = date('Y-m-d h:i:s', time());

        $checker = $cardService->updateModel($cardAttributes, $card['id']);

        if ($checker == false) {
            /**
             * @var Message $cardService
             */
            $this->createHandlerResponse($cardService->getMessage(), false);
        }

        return parent::handle($attributes);
    }
}