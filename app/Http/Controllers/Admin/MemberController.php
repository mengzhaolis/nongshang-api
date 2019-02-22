<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use App\Http\Models\Member;
use App\Http\Models\User;
use App\Http\Models\News;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //首页
    public function member_list()
    { 
      // 读取注册用户列表  
      $data = Member::where('is_allot',0)->get();
      $array = $data->toArray();
      // 读取销售人员
      $sell = User::where('status',1)->get();
      $sells = $sell->toArray();
      // print_r($array);die;
      return view('member.member_list',['data'=>$array,'sell'=>$sells]);
    }
    // 销售-用户关系表
    public function user_member(Request $request)
    {
        // return $request;
        $new = $request->input('news');
        // return $new;
        $news =explode(',',$new) ;
        // var_dump($news);die;
        $user_id = $request->input('user_id');
        DB::transaction(function () use ($user_id,$news) {
            foreach ($news as $key=>$value) {
            // var_dump($i);die;
                News::insertGetId(['user_id'=>$user_id,'news_id'=>$value]);
            }
        });
        // return count($news);
        DB::transaction(function () use ($news) {
            foreach ($news as $key=>$value) 
            {
                Member::where('id',$value)->update(['is_allot'=>1]);
            }
        });
    }
}