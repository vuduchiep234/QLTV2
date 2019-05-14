<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:02 AM
 */

namespace App\Decorators\Handlers\Card;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use DateTime;

class CheckCardLimitHandler extends CardHandler
{
    private static $MISSING_USER_ID = "Missing user id";
    private static $NO_CARD = "User has no card";
    private static $INVALID_CARD = "Library card is invalid";
    private static $ALLOWED = 30;

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('userId', $attributes)) {
            return $this->createHandlerResponse(self::$MISSING_USER_ID, false);
        }

        $pairs = [
            [
                'needle' => 'user_id',
                'value' => $attributes['userId']
            ]
        ];

        $cardService = $this->createHandlerService();
        $card = $cardService->getBy($pairs);

        if ($card == null) {
            return $this->createHandlerResponse(self::$NO_CARD, false);
        }
        $cardUpdateTime = $card['updated_at'];
        $currentTime = date('Y-m-d h:i:s', time());

        $date1 = new DateTime($currentTime);
        $date2 = new DateTime($cardUpdateTime);
        $diff = $date1->diff($date2);

        if ($diff->days > self::$ALLOWED) {
            return $this->createHandlerResponse(self::$INVALID_CARD, false);
        }

        return parent::handle($attributes);
    }
}