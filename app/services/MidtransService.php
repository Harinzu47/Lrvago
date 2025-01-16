<?php

namespace App\Services;

use Midtrans\Config;

class MidtransService
{
    public static function configure()
    {
        Config::$isProduction = config('midtrans.is_production');
        Config::$serverKey = config('midtrans.server_key');
    }
}
