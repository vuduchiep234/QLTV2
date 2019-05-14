<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:22 AM
 */

namespace App\Http\Controllers\API;


use App\Decorators\CardDecorator\CreateCardProxy;
use App\Decorators\CardDecorator\RenewedCardDecorator;
use App\Decorators\CardDecorator\RenewedCardTransactionDecorator;
use App\Http\Controllers\Requests\API\Card\CardPostRequest;

use App\Http\Controllers\Requests\API\Card\CardRenewedRequest;
use App\Services\CardService;
use App\Services\Message;

class CardController extends APIController
{
    public function __construct(CardService $service)
    {
        parent::__construct($service);
    }

    public function post(CardPostRequest $request)
    {
        /**
         * @var CardService $service
         */
        $service = $this->getService();
        $enhancedService = new CreateCardProxy($service);
        $card = $enhancedService->createNewModel($request->all());
        if ($card != null) {
            return $card;
        }
        /**
         * @var Message $enhancedService
         */
        return response(['Message' => $this->message($enhancedService)], 403);
    }

    public function renewed(CardRenewedRequest $request, int $id = null)
    {
        /**
         * @var CardService $service
         */
        $service = $this->getService();
        $enhancedService = new RenewedCardDecorator($service);
        $transactionService = new RenewedCardTransactionDecorator($enhancedService);
        $id = ($id == null) ? $request->get('card_id') : $id;
        $renewedStatus = $transactionService->updateModel($request->all(), $id);
        if ($renewedStatus == true) {
            return ['Renewed Card success'];
        }
        return $this->message($transactionService);
    }
}