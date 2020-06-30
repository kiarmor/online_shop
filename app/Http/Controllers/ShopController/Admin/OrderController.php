<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Repositories\Admin\MainAdminRepository;
use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use MetaTag;

class OrderController extends AdminBaseController
{
    protected $order_repository;

    public function __construct()
    {
        parent::__construct();
        $this->order_repository = app(OrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        MetaTag::setTags(['title' => 'Orders list']);

        $perpage = 5;
        $count_orders = MainAdminRepository::getCountOrders();
        $orders = $this->order_repository->getAllOrders(7);

        return view('shop.admin.order.order', compact('count_orders', 'orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->order_repository->getId($id);
        MetaTag::setTags(['title' => "Order № {$item->id}"]);
        $order = $this->order_repository->getOneOrder($item->id);
        $order_products = $this->order_repository->getAllOrderProductsId($item->id);

        return view('shop.admin.order.edit', compact('item', 'order', 'order_products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
