<?php
/**
 * PhpStorm.
 * User: bing
 * Date: 2018/10/27
 * Time: 下午8:24
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Oss extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'Oss';
    }
}