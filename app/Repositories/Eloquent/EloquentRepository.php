<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 12:10 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class EloquentRepository implements Repository
{
    protected $manyToManyRelations = [];

    private $queryBuilder;
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->queryBuilder = $this->model->newQuery();
    }

    public function get(int $id, array $relations = []): ?Model
    {
        return $this->newQuery()->with($relations)->find($id);
    }

    public function count(array $conditions): int
    {
        return $this->newQuery()->where($conditions)->count();
    }

    public function find(int $id): ?Model
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function create(array $attributes): ?Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(array $attributes, Model $model): bool
    {
        return $model->update($attributes, []);
    }

    public function delete(array $attributes, int $id): int
    {
        return $this->newQuery()->getModel()::destroy($id);
    }

    public function syncModel(array $attributes, $relation,  Model $model)
    {
        $model->$relation()->sync($attributes[$relation]);
    }

    public function attach(array $attributes, $relation, Model $model)
    {
        $model->$relation()->attach($attributes[$relation]);
    }

    public function newQuery(){
        return clone $this->queryBuilder;
    }
    public function getQuery(): Builder
    {
        return $this->queryBuilder;
    }

    public function getAll(array $attributes = [])
    {
        $relations = isset($attributes['relations']) ? $attributes['relations'] : [];
        $order = isset($attributes['order']) ? $attributes['order'] : 'asc';
        $sort = isset($attributes['sort']) ? $attributes['sort'] : 'id';
        $limit = isset($attributes['limit']) ? $attributes['limit'] : 20;
        $offset = isset($attributes['offset']) ? $attributes['offset'] : 0;

        return $this->newQuery()->with($relations)->limit($limit)->offset($offset)->orderBy($sort, $order)->get();
    }

    public function getBetween($needle, array $duration,  array $relations = [])
    {
        return $this->newQuery()->whereBetween($needle, $duration)->with($relations)->get();
    }

    public function getBy(array $conditions, array $relations = [])
    {
        $model = DB::table($this->model->getTable())->where($conditions)->first();

        if ($model != null) {
            $model = get_object_vars($model);
        }

        if (count($relations) != 0) {
            return $this->newQuery()->where($conditions)->with($relations)->find($model['id']);

        }
        return $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }
}