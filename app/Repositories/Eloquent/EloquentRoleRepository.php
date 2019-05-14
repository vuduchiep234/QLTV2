<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:51 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Role;
use App\Repositories\RoleRepository;

class EloquentRoleRepository extends EloquentRepository implements RoleRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}