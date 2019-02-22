<?php

namespace App\Providers;

use App\Services\Token;
use Illuminate\Support\ServiceProvider;

class wxTokenServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('Token', function () {
            return new Token();
        });
    }
}