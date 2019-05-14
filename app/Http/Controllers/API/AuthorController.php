<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:11 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\AuthorDecorators\GetAuthorDecorator;
use App\Http\Controllers\Requests\API\Author\AuthorDeleteRequest;
use App\Http\Controllers\Requests\API\Author\AuthorGetRequest;
use App\Http\Controllers\Requests\API\Author\AuthorPatchRequest;
use App\Http\Controllers\Requests\API\Author\AuthorPostRequest;
use App\Http\Controllers\Requests\GetRequest;
use App\Services\AuthorService;

class AuthorController extends APIController
{
    public function __construct(AuthorService $service)
    {
        parent::__construct($service);
    }

    public function get(AuthorGetRequest $request, int $id = null)
    {
        $relations = $request->getRelations();
        if ($relations != null) {
            /**
             * @var AuthorService $authorService
             */
            $authorService = $this->getService();
            $enhancedService = new GetAuthorDecorator($authorService);
            return $enhancedService->getModel($relations, $id);
        }
        return parent::_get($request, $id);
    }

    public function post(AuthorPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(AuthorPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(AuthorDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function all(AuthorGetRequest $request)
    {
        return parent::_all($request);
    }
}