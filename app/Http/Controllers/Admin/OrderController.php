<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //首页
    public function order_list()
    {   
        return view('order.order_list');
    }
    // 获取订单和用户的数据
    public function order_details(Request $request)
    {
        return OrderService::getOrder($request);
    }
}