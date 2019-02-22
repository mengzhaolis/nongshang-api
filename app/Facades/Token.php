<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Token extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'Token';
    }
}