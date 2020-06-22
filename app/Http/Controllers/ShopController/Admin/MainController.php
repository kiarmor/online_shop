<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MetaTag;

class MainController extends AdminBaseController
{
    public function index()
    {
        MetaTag::setTags(['title' => 'Admin Panel']);
        return view('shop.admin.main.index');
    }
}
