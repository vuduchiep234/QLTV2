<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 3:56 PM
 */

namespace App\Decorators\BookHistoryDecorator;


use App\Decorators\Handlers\Handlerable;

abstract class UpdateHistoryDecorator extends EloquentBookHistoryDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $bookHistoryService = $this->getService();
        $arrangedHandler = $this->arrangedHandler();

        //gather input information
        $userId = $id;
        $bookCopies = $attributes['bookCopies'];

        //set up for searching
        $userPair = [
            'needle' => 'user_id',
            'value' =>  $userId
        ];

        $statePair = [
            'needle' => 'state',
            'value' => true
        ];

        $pairs = [];

        array_push($pairs, $userPair);
        array_push($pairs, $statePair);

        foreach ($bookCopies as $bookCopy) {

            $bookCopyPair = [
                'needle' => 'book_copies_id',
                'value' =>  $bookCopy
            ];

            array_push($pairs, $bookCopyPair);

            $history = $bookHistoryService->getBy($pairs, ['bookCopy']);
            unset($pairs[2]);

            if ($history != null) {
                $handleAttributes = $this->setHandlerAttribute($history);
                $response = $arrangedHandler->handle($handleAttributes);
                if ($response->getResponseStatus() == false) {
                    return false;
                }
            }
        }

        return true;
    }

    abstract public function arrangedHandler(): Handlerable;

    abstract public function setHandlerAttribute($history) : array;
}