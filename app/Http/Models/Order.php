<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;

    /**
     * 定义关联关系，关联用户表
     *
     * @var array
     */
    // 追加字段
    protected $appends =['member_name','member_phone'];
    public function member()
    {
      return $this->hasOne('App\Http\Models\Member','id','member_id');
    }
    // 关联用户读取用户的姓名手机号
    public function getMemberNameAttribute()
    {
        return is_object($this->member) ? $this->member->member_name.'/'.$this->member->member_address: null;
    }
    public function getMemberPhoneAttribute()
    {
        return is_object($this->member) ? $this->member->member_phone : null;
    }
    public static function getOrders(Request $request, $where)
    {
      $page = $request->query('page',10);
      $size = $request->query('size',1);
      return self::where($where)->orderBy('id','DESC')->paginate($size);
    }
}