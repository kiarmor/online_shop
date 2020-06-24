<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 23.06.2020
 * Time: 18:19
 */

namespace App\Repositories\Admin;


use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainAdminRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public static function getCountOrders()
    {
        return DB::table('orders')
            ->where('status', '0')
            ->get()
            ->count();
    }

    public static function getCountUsers()
    {
        return DB::table('users')
            ->get()
            ->count();
    }

    public static function getCountProducts()
    {
        return DB::table('products')
            ->get()
            ->count();
    }

    public static function getCountCategories()
    {
        return DB::table('categories')
            ->get()
            ->count();
    }
}