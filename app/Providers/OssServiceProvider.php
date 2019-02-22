<?php
/**
 * PhpStorm.
 * User: bing
 * Date: 2018/10/27
 * Time: 下午8:47
 */

namespace App\Providers;


use App\Services\Oss;
use Illuminate\Support\ServiceProvider;

class OssServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('Oss', function () {
            return new Oss();
        });
    }
}