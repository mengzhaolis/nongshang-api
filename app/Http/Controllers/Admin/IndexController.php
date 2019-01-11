<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
// use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //首页
    public function index()
    {   
        return view('admin.welcome');
    }
}