<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Facades\Token;

class TokenController extends Controller
{
    // 获取微信token
    public function getToken($code)
    {   
        $token = Token::createToken();
        return $token;
    }
}