<?php

namespace App\Services;

use App\Http\Models\User;
use App\Http\Models\common;
/**
 * 
 */
class Token
{
	
	// 微信获取token
	protected $AppId;
	protected $AccessKey;
	protected $token_url;
	protected $code;

	function __construct($code)
	{
		$this->code = $code;
		$this->AppId = Config('token.appId');
		$this->AccessKey = Config('token.accessKey');
		$this->token_url = sprintf(Config('token.token_url'),"$this->AppId","$this->AccessKey","$this->code");
	}
	// php发送url请求
	public function getToken()
	{
		// return $this->token_url;
		//初始化
    	$curl = curl_init();
	    //设置抓取的url
	    curl_setopt($curl, CURLOPT_URL, $this->token_url);

	    //设置获取的信息以文件流的形式返回，而不是直接输出。
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    //设置头文件的信息作为数据流输出
	    // curl_setopt($curl, CURLOPT_HEADER, false);
	    // 跳过证书检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在 
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
	    //执行命令
	    $reset = curl_exec($curl);
	    $httprest= curl_getinfo($curl, CURLINFO_HTTP_CODE);
	    //关闭URL请求
	    curl_close($curl);
	    // 验证返回数据是否合法返回值为json通过函数json_decode()将数据转换为数组
	    $data = json_decode($reset,true);
	    // return $data;
	    //判断token是否请求成功
	    if(array_key_exists('errcode', $data))
	    {
	    	throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException('获取token失败请重试!!!');
	    }else
	    {
	    	// return 1;
	    	// 返回调用信息
	    	$uid = $this->createToken($data);
	    	return $uid;
	    }
	}
	// 处理调用成功后得返回信息
	private function createToken($data)
	{	
		/*
		*取出openid
		*查询数据库中是否存在
		*如果存在则不处理，不存在则新增数据
		*生成令牌，写入缓存
		*将生成令牌返回到客户端
		**/
		$openid = $data['openid'];
		$id = User::where('openid',$openid)->value('id');
		if($id)
		{
			$uid = $id;
			return $uid;
		}else
		{
			$uid = User::insertGetId($openid);
			$wxtoken = common::makeToken(32);
			return $uid;
		}
	}
}
