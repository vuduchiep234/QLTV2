<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:59 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\UserRepository;
use App\Services\UserService;

class EloquentUserService extends EloquentService implements UserService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }
}