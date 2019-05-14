<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:03 PM
 */

namespace App\Decorators\Handlers\Book\BookQuantity\UpdateQuantity;


use App\Decorators\Handlers\Book\BookQuantity\BookQuantityHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

abstract class UpdateQuantityHandler extends BookQuantityHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $bookQuantityService = $this->createHandlerService();

        $bookId = $attributes['bookId'];

        $pairs = [
            [
                'needle' => 'book_id',
                'value' => $bookId,
            ]
        ];

        $bookQuantity = $bookQuantityService->getBy($pairs);

        //retrieve book quantity data
        $bookQuantityId = $bookQuantity['id'];
        $currentQuantity = $bookQuantity['quantity'];
        $additionQuantity = $attributes['quantity'];
        //calculate update quantity
        $updatedQuantity = $this->calculate($currentQuantity, $additionQuantity);
        //set up data and update database
        $bookQuantityAttributes['quantity'] = $updatedQuantity;
        $updateChecker = $bookQuantityService->updateModel($bookQuantityAttributes, $bookQuantityId);
        //return error message if update failed
        if (!$updateChecker) {
            return $this->createHandlerResponse($this->getServiceMessage($bookQuantityService), false);
        }
        return parent::handle($attributes);
    }

    abstract public function calculate(int $current, int $addition): int;
}