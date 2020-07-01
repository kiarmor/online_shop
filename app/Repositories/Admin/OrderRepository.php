<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 24.06.2020
 * Time: 9:47
 */

namespace App\Repositories\Admin;
use App\Models\Admin\Order as Model;

use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\DB;

class OrderRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllOrders($perpage)
    {
        return $this->startConditions()->withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.id', 'orders.user_id', 'orders.status', 'orders.created_at',
                    'orders.updated_at', 'orders.currency', 'users.name',
                    DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->toBase()
            ->paginate($perpage);
    }

    public function getOneOrder($order_id)
    {
        return $this->startConditions()->withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->select('orders.*', 'users.name',
                DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->where('orders.id', $order_id)
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->limit(1)
            ->first();
    }

    public function getAllOrderProductsId($order_id)
    {
        return DB::table('order_products')
            ->where('order_id', $order_id)
            ->get();
    }

    public function changeStatusOrder($id)
    {
        $item = $this->getId($id);
       /* if (!$item){
            abort(404);
        }*/
        //$item->status = $_GET['status'] == 1 ?? 0;//20:25
        //dd($item->status);
        $item->status = !empty($_GET['status']) ? '1' : '0';
        $result = $item->update();
        return $result;
    }
}