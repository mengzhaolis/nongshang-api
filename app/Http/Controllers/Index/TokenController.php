<?php

namespace app\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Services\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    // 获取微信token
    public function getToken(Request $request)
    {   
    	$code = $request->get('code');
        $t = new Token($code);
        $token = $t->getToken();
        return $token;
    }
}