<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Type;
use App\Http\Models\Good;
use App\Facades\Oss;
header("Access-Control-Allow-Origin: *");

class TradeController extends Controller
{
    // 商品添加
    public function trade_add(Request $request)
    {   
        $data = $request->except('_token');
        if(empty($data))
        {
            $type = Type::select('id','type_name')->get();
            // var_dump($type);die;
            return view('trade.trade_add',['type'=>$type]);
        }
        return Good::firstOrCreate($data);
    }
    // 商品封面图上传
    public function trade_image(Request $request)
    {
        $file = $request->file('image');
        return response(Oss::uploadFile($file),201);
    }
    // 商品列表
    public function goods_list()
    {
        $data = Good::where('status',1)->select('goods_name','goods_path','type_id','zhongliang','price','created_at','goods_type','id')->orderby('created_at','desc')->get();
        return view('trade.trade_list',['data'=>$data]);
    }
    // 商品下架
    public function goods_old(Request $request)
    {
        $id = $request->except('_token');
        return Good::where('id',$id)->update(['status'=>0]);
    }
}