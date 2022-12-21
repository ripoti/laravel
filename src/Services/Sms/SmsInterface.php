<?php

namespace Kinatech\BugClasper\Services\Sms;

interface SmsInterface
{
    public function send(string $msisdn, string $message, array $config = null);
}
