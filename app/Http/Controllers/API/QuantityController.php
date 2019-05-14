<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/3/2019
 * Time: 1:01 AM
 */

namespace App\Http\Controllers\API;


use App\Decorators\QuantityDecorators\ImportBook\ImportBookDecorator;
use App\Decorators\QuantityDecorators\ImportBook\ImportBookTransactionDecorator;
use App\Http\Controllers\Requests\API\Book\BookImportRequest;
use App\Services\BookQuantityService;

class QuantityController extends APIController
{
    public function __construct(BookQuantityService $service)
    {
        parent::__construct($service);
    }

    public function import(BookImportRequest $request, int $id = null)
    {
        $id = ($id == null) ? $request->get('id') : $id;
        /**
         * @var BookQuantityService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new ImportBookDecorator($bookService);
        $transactionService = new ImportBookTransactionDecorator($enhancedService);
        $checker = $transactionService->updateModel($request->all(), $id);
        if ($checker) {
            return ['success'];
        }
        return [$this->message($transactionService)];
    }
}