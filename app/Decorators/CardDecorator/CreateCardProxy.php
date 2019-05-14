<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/20/2019
 * Time: 8:46 PM
 */

namespace App\Decorators\CardDecorator;


use App\Decorators\Handlers\Card\CheckCardExistHandler;
use Illuminate\Database\Eloquent\Model;

class CreateCardProxy extends EloquentCardDecorator
{
    public function createNewModel(array $attributes): ?Model
    {
        if ($this->checkCreate($attributes)) {
            return parent::createNewModel($attributes);
        }
        else {
            return null;
        }
    }

    private function checkCreate(array $attributes) : bool
    {
        $cardHandler = new CheckCardExistHandler();
        $response = $cardHandler->handle($attributes);
        if ($response->getResponseStatus() == true) {
            return true;
        }
        $this->setMessage($response->getResponseMessage());
        return false;
    }
}