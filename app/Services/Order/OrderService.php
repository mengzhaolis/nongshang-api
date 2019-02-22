<?php

namespace App\Services\Order;

use App\Http\Models\Order;
use App\Services\Service;

class OrderService extends Service
{
  // 订单列表
  static public function getOrder($request)
  {
    $page = $request->query('page',10);
    // return $page;
    $size = $request->query('size',1);
    $key = $request->query('key','');
    return Order::get();
    $orders = Order::orderBy('id','DESC');
    // return $order;
    // 如果存在搜索条件
    if(!empty($key) && isset($key))
    {
      $orders->where([['good_name','like',$key],['status',1]]);
    }
    if(!empty($page))
    {
      $orders->where('status',1);
    }
    return $orders->paginate($size);
  }
}