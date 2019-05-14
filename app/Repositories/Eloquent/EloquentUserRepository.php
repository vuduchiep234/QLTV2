<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:50 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepository;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}