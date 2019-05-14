<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:15 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\GenreDecorators\GetGenreDecorator;
use App\Http\Controllers\Requests\API\Genre\GenreDeleteRequest;
use App\Http\Controllers\Requests\API\Genre\GenreGetRequest;
use App\Http\Controllers\Requests\API\Genre\GenrePatchRequest;
use App\Http\Controllers\Requests\API\Genre\GenrePostRequest;
use App\Services\GenreService;

class GenreController extends APIController
{
    public function __construct(GenreService $service)
    {
        parent::__construct($service);
    }

    public function get(GenreGetRequest $request, int $id = null)
    {
        $relations = $request->getRelations();
        if ($relations != null) {
            /**
             * @var GenreService $genreService
             */
            $genreService = $this->getService();
            $enhancedService = new GetGenreDecorator($genreService);
            return $enhancedService->getModel($relations, $id);
        }
        return parent::_get($request, $id);
    }

    public function post(GenrePostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(GenrePatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(GenreDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function all(GenreGetRequest $request)
    {
        return parent::_all($request);
    }
}