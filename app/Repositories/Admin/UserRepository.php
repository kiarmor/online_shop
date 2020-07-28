<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 28.07.2020
 * Time: 15:32
 */

namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use App\Models\Admin\AdminUser as Model;
use Illuminate\Support\Facades\DB;

class UserRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllUsers($perpage)
    {
        $users = DB::table('users')
            ->join('user_roles', 'user_roles.user_id', '=', 'users.id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'users.email', 'roles.name as role')
            ->orderBy('users.id')
            ->paginate($perpage);

        return $users;
    }
}