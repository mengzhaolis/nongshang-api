<?php
/**
 * PhpStorm.
 * User: bing
 * Date: 2018/9/14
 * Time: 上午12:55
 */

namespace App\Services;


use App\Models\Config;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Service
{
    /**
     * 默认页码
     *
     * @var int
     */
    static protected $page = 1;

    /**
     * 默认页长度
     *
     * @var int
     */
    static protected $size = 15;

    /**
     * 检测是否开启时段运营
     */
    // public static function runCheck()
    // {
    //     $base = Config::getConfig('base')['base'];
    //     if($base['run_switch'])
    //     {
    //         $now = time();
    //         if($now < strtotime(date('Y-m-d').$base['run_start']) || $now > strtotime(date('Y-m-d').$base['run_end']))
    //         {
    //             throw new HttpException(422,'请在运营时间 '.$base['run_start'] .'-'. $base['run_end'] .'内操作');
    //         }
    //     }
    // }
}