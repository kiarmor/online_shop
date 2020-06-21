<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends AdminBaseController
{
    public function index()
    {
        return view('shop.admin.main.index');
    }
}
