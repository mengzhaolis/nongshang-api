<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['goods_name','price','zhaiyao','goods_path','zhongliang','asc','type_id','goods_type'];
}