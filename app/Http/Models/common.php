<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class common extends Model
{
    /**
	 * $length 需要得随机数得长度
    */
    public function makeToken($length)
    {
    	$array = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890zxcvbnmasdfghjklqwertyuiop";
    	$max = strlen($array) - 1;
    	for($i=0;$i<$length;$i++)
    	{
		    $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}
		return $str;
    }
}