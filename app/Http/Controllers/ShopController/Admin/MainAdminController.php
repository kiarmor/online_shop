<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\MainAdminRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;
use MetaTag;

class MainAdminController extends AdminBaseController
{
    private $order_repository;
    private $product_repository;

    public function __construct()
    {
        parent::__construct();
        $this->order_repository = app(OrderRepository::class);
        $this->product_repository = app(ProductRepository::class);
    }

    public function index()
    {
        $count_orders = MainAdminRepository::getCountOrders();
        $count_users = MainAdminRepository::getCountUsers();
        $count_products = MainAdminRepository::getCountProducts();
        $count_categories = MainAdminRepository::getCountCategories();
        $perpage_orders = 6;
        $perpage_products = 3;

        $last_orders = $this->order_repository->getAllOrders($perpage_orders);
        $last_products = $this->product_repository->getLastProducts($perpage_products);

        MetaTag::setTags(['title' => 'Admin Panel']);
        return view('shop.admin.main.index', compact(
            'count_orders',
            'count_users',
            'count_products',
            'count_categories',
            'last_orders',
            'last_products'
        ));
    }
}
