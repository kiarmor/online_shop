<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 24.06.2020
 * Time: 9:47
 */

namespace App\Repositories\Admin;
use App\Models\Admin\Order as Model;
use App\Models\Admin\Order;
use App\Repositories\CoreRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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

    public function getAllOrders($perpage): LengthAwarePaginator
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

    public function getOneOrder($order_id): Order
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

    public function getAllOrderProductsId($order_id): Collection
    {
        return DB::table('order_products')
            ->where('order_id', $order_id)
            ->get();
    }

    public function changeStatusOrder($request ,$id): bool
    {
        $item = $this->getId($id);
        $item->status = $request->status;
        $result = $item->update();
        return $result;
    }

    public function changeStatusOnDelete($id): bool
    {
        $item = $this->getId($id);
        $item->status = '2';
        $result = $item->update();

        if ($result){
            Order::destroy($id);
        }
        return $result;
    }

    public function saveOrderComment($request, $id): Order
    {
        $item = $this->getId($id);
        $item->note = $request->comment;
        $item->update();
        return $item;
    }

    public function deleteFromDataBase($id): bool
    {
        $item = DB::table('orders')->delete($id);
        return $item;
    }
}