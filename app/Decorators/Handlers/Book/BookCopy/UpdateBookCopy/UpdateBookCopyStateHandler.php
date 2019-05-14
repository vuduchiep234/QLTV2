<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 1:23 AM
 */

namespace App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy;


use App\Decorators\Handlers\Book\BookCopy\BookCopyHandler;
use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

abstract class UpdateBookCopyStateHandler extends BookCopyHandler
{
    private static $ERROR_MESSAGE = 'Missing bookCopy';
    public function handle(array &$attributes): HandlerResponse
    {
        $bookCopyService = $this->createHandlerService();

        //gather updated data
        if (!array_key_exists('bookCopy', $attributes)) {
            return $this->createHandlerResponse(self::$ERROR_MESSAGE, false);
        }

        $bookCopy = $attributes['bookCopy'];
        $bookCopyId = $bookCopy['id'];

        //set up updated data
        $bookCopyAttributes['state'] = $this->createState();
        $bookCopyAttributes['state_detail'] = $this->createStateDetail();

        //update database
        $updateChecker = $bookCopyService->updateModel($bookCopyAttributes, $bookCopyId);

        if (!$updateChecker) {
            return $this->createHandlerResponse($this->getServiceMessage($bookCopyService), false);
        }

        return parent::handle($attributes);
    }

    abstract public function createState() :bool;
    abstract public function createStateDetail(): string;
}