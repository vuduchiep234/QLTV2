<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 12:07 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function get(int $id, array $relation = []) :?Model;

    public function create(array $attributes): ?Model;

    public function update(array $attributes, Model $model): bool;

    public function delete(array $attributes, int $id): int;

    public function count(array $conditions) :int;

    public function syncModel(array $attributes, $relation,  Model $model);

    public function attach(array $attributes, $relation,  Model $model);

    public function find(int $id);

    public function getAll(array $attributes = []);

    public function getQuery(): Builder;

    public function getBetween($needle, array $duration, array $relations = []);

    public function getBy(array $conditions, array $relations = []);
}