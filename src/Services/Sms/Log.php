<?php

namespace Ripoti\Services\Sms;

use Illuminate\Support\Facades\Http;

class Log implements SmsInterface
{

    public function send(string $msisdn, string $message, array $config = null)
    {
        app('log')->info(json_encode([
            'msisdn'   => $msisdn,
            'message' => $message,
        ]));
    }
}
