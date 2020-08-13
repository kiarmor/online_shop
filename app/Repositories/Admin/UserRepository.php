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

    public function getAllRoles()
    {
        return DB::table('roles')->get();
    }

    public function getUserRole($user_id)
    {
        //TODO: review DB query
        $role = DB::table('user_roles')
            ->join('roles', 'id', '=', 'user_roles.role_id')
            ->where('user_id', $user_id)
            ->select('name')
            ->get();

        return $role;
    }

    public function getAllUserOrders($user_id, $perpage)
    {
        $orders = DB::table('users')
            ->join('orders', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.id', 'orders.user_id', 'orders.status', 'orders.created_at', 'orders.updated_at',
                'orders.currency', DB::raw('ROUND(SUM(order_products.price),2)AS sum'))
            ->where('user_id', $user_id)
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->paginate($perpage);

        return $orders;
    }

}