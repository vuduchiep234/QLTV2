<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 8:21 AM
 */

namespace App\Decorators;


use App\Repositories\Repository;
use App\Services\Message;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class EloquentDecorator implements Decorator, Message
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function createNewModel(array $attributes): ?Model
    {
        return $this->service->createNewModel($attributes);
    }

    public function updateModel(array $attributes, $id): bool
    {
        return $this->service->updateModel($attributes, $id);
    }

    public function deleteModel(array $attributes, $id): int
    {
        return $this->service->deleteModel($attributes, $id);
    }

    public function getModel(array $attributes, $id): ?Model
    {
        return $this->service->getModel($attributes, $id);
    }

    public function count(array $pairs = []): int
    {
        return $this->service->count();
    }

    public function getRepository(): Repository
    {
        return $this->service->getRepository();
    }

    public function getAll(array $attributes = [])
    {
        return $this->service->getAll($attributes);
    }

    public function getBetween($needle, $from, $to, array $relations = [])
    {
        return $this->service->getBetween($needle, $from, $to, $relations);
    }

    public function getBy(array $pairs, array $relations = [])
    {
        return $this->service->getBy($pairs, $relations);
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function setMessage(string $content)
    {
        /**
         * @var Message $message
         */
        $message = $this->service;
        $message->setMessage($content);
    }

    public function getMessage(): string
    {
        /**
         * @var Message $message
         */
        $message = $this->service;
        return $message->getMessage();
    }
}