<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 12:11 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\Repository;
use App\Services\Message;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EloquentService implements Service, Message
{
    protected $manyToManyRelations = [];

    private $repository;
    private $message;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;
    }

    public function getModel(array $attributes, $id): ?Model
    {
        return $this->repository->get($id, $attributes);
    }

    public function getAll(array $attributes = [])
    {
        return $this->repository->getAll($attributes);
    }

    public function createNewModel(array $attributes): ?Model
    {
        $model = null;
        try{
            DB::transaction(function () use ($attributes, &$model){
                $model = $this->repository->create($attributes);
                foreach($this->manyToManyRelations as $relation){
                    if(method_exists($model, $relation) && array_key_exists($relation, $attributes)){
                        $this->repository->syncModel($attributes, $relation, $model);
                    }
                }
            });
        }
        catch (\Exception $e){
            $this->setMessage($e->getMessage());
            return null;
        }
        return $model;
    }

    public function updateModel(array $attributes, $id): bool
    {
        $state = false;
        try{
            DB::transaction(function () use ($attributes, $id, &$state){
                $model = $this->repository->find($id);
                $state = $this->repository->update($attributes, $model);
                foreach($this->manyToManyRelations as $relation){
                    if(method_exists($model, $relation) && array_key_exists($relation, $attributes)){
                        $this->repository->syncModel($attributes, $relation, $model);
                    }
                }
            });
            return $state;
        }catch (\Exception $e){
            $this->setMessage($e->getMessage());
            return false;
        }
    }

    public function deleteModel(array $attributes, $id): int
    {
        return $this->repository->delete($attributes,$id);
    }

    public function count(array $pairs = []): int
    {
        $conditions = $this->createConditions($pairs);
        return $this->repository->count($conditions);
    }

    public function getRepository(): Repository
    {
        return $this->repository;
    }


    public function getBetween($needle, $from, $to, array $relations = [])
    {
        if (strcasecmp($needle, 'created_at') == 0) {
            $date = $to;
            $to = date('Y-m-d', strtotime($date .' +1 day'));
        }

        $duration = [$from, $to];
        return $this->repository->getBetween($needle, $duration, $relations);
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function getBy(array $pairs, array $relations = [])
    {
        if (count($pairs) == 0) {
            return null;
        }
        $conditions = $this->createConditions($pairs);

        return $this->repository->getBy($conditions, $relations);
    }

    private function createConditions(array $pairs): array
    {
        $conditions = [];
        foreach ($pairs as $pair) {
            $condition[] = $pair['needle'];
            $condition[] = '=';
            $condition[] = $pair['value'];
            array_push($conditions, $condition);
            $condition = [];
        }
        return $conditions;
    }
}