<?php

namespace Kinatech\BugClasper\Services\Sms;

use AfricasTalking\SDK\AfricasTalking as AT;

class AfricasTalking implements SmsInterface
{
    public function send(string $msisdn, string $message, array $config = null)
    {
        $at = (new AT($config['username'], $config['apiKey']))->sms();
        $res = $at->send([
            'to'      => $msisdn,
            'message' => $message
        ]);

        logger()->channel('integration')->info('AfricasTalking Response', $res);
    }
}
