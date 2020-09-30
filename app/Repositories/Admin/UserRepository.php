<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 28.07.2020
 * Time: 15:32
 */

namespace App\Repositories\Admin;


use App\Models\UserRole as UserRole;
use App\Repositories\CoreRepository;
use App\Models\Admin\AdminUser as Model;
use Illuminate\Support\Facades\DB;
use App\User as User;

class UserRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $perpage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
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

    /**
     * @param $user_id
     * @return User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getUser($user_id)
    {
        $users = User::all();
        $user = $users->find($user_id);

        return $user;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllRoles()
    {
        return DB::table('roles')->get();
    }

    /**
     * @param $user_id
     * @return \Illuminate\Support\Collection
     */
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

    /**
     * @param $user_id
     * @param $perpage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
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

    /**
     * @param $user
     * @param $request
     * @return mixed
     */
    public function updateUser($user, $request)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $save = $user->save();

        $role = DB::table('user_roles')
            ->where('user_id', $request['id'])
            ->update(['role_id' => $request['role']]);

        return $save;
    }

}