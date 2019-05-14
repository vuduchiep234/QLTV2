<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:27 AM
 */

namespace App\Decorators\CardDecorator;


use App\Decorators\Handlers\Card\RenewedCardHandler;

class RenewedCardDecorator extends EloquentCardDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $attributes['cardId'] = $id;
        $renewedCardHandler = new RenewedCardHandler();
        $handlerResponse = $renewedCardHandler->handle($attributes);

        if ($handlerResponse->getResponseStatus() == false) {
            $this->setMessage($handlerResponse->getResponseMessage());
            return false;
        }

        return parent::updateModel($attributes, $id);
    }
}