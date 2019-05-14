<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:58 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\RoleRepository;
use App\Services\RoleService;

class EloquentRoleService extends EloquentService implements RoleService
{
    public function __construct(RoleRepository $repository)
    {
        parent::__construct($repository);
    }
}