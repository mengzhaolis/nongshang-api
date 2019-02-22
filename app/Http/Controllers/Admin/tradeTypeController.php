<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class tradeTypeController extends Controller
{
    // 分类添加
    public function tradetype_add(Request $request)
    {
        if(empty($request->input()))
        {
            return view('trade_type.trade_type_add');
        }else
        {
            $data = $request->except('_token');
            $id = Type::firstOrCreate($data);
            return $id;
        }
    }
    // 分类列表页
    public function type_list()
    {
        $data = Type::all();
        // var_dump($data);die;
        return view('trade_type.trade_type_list',['data'=>$data]);
    }
}