<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:08 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\BookDecorators\BorrowBook\BorrowBookDecorator;
use App\Decorators\BookDecorators\BorrowBook\BorrowBookProxy;
use App\Decorators\BookDecorators\BorrowBook\BorrowBookTransactionDecorator;
use App\Decorators\BookDecorators\CreateBookDecorator;
use App\Decorators\BookDecorators\GetAllBookDecorator;
use App\Decorators\BookDecorators\UpdateBookDecorator;
use App\Http\Controllers\Requests\API\Book\BookBorrowRequest;
use App\Http\Controllers\Requests\API\Book\BookDeleteRequest;
use App\Http\Controllers\Requests\API\Book\BookGetRequest;
use App\Http\Controllers\Requests\API\Book\BookPatchRequest;
use App\Http\Controllers\Requests\API\Book\BookPostRequest;
use App\Http\Controllers\Requests\API\Book\BookSearchRequest;
use App\Services\BookService;
use App\Services\Message;

class BookController extends APIController
{
    public function __construct(BookService $service)
    {
        parent::__construct($service);
    }

    public function get(BookGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(BookPostRequest $request)
    {
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new CreateBookDecorator($bookService);
        $model = $enhancedService->createNewModel($request->all());
        if ($model == null) {
            return response(
                ['Message' => $this->message($enhancedService)],
                403);
        }
        return $model;
    }

    public function patch(BookPatchRequest $request, int $id = null)
    {
        /**
         * @var BookService $bookService
         */
        $id = ($id == null) ? $request->get('id') : $id;
        $bookService = $this->getService();
        $enhancedService = new UpdateBookDecorator($bookService);
        $updateChecker = $enhancedService->updateModel($request->all(), $id);
        if ($updateChecker == null) {
            return response(
                ['Message' => $this->message($enhancedService)],
                403);
        }
        return response(
            ['Message' => "Update Success"],
            200);
    }

    public function delete(BookDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function borrow(BookBorrowRequest $request)
    {
        $id =  $request->get('user_id');
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $enhancedService = new BorrowBookDecorator($bookService);
        $proxyService = new BorrowBookProxy($enhancedService);
        $transactionService = new BorrowBookTransactionDecorator($proxyService);
        $status = $transactionService->updateModel($request->all(), $id);
        if ($status) {
            return ['success'];
        }
        /**
         * @var Message $transactionService;
         */
        return $this->message($transactionService);
    }

    public function search(BookSearchRequest $request)
    {
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        return $bookService->searchBook($request->all());
    }

    public function all(BookGetRequest $request)
    {

        //hiep vd
        /**
         * @var BookService $bookService
         */
        $bookService = $this->getService();
        $bookDecorator = new GetAllBookDecorator($bookService);
        return $bookDecorator->getAll($request->all());
    }
}