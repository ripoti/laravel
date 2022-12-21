<?php

return [

    'default' => env('RIPOTI_CHANNEL', 'slack'),

    "channels" => [
        "slack" => [
            "webHookUrl" => env('SLACK_WEBHOOK_URL', ''),
            "channel" => \Ripoti\Channels\SlackChannel::class
        ],

        "sms" => [
            'default' => env('SMS_PROVIDER', 'africas_talking'),

            "channel" => \Ripoti\Channels\SmsChannel::class,

            'providers' => [
                'africas_talking' => [
                    'username' => env('AT_USERNAME', 'sandbox'),
                    'apiKey' => env('AT_API_KEY', 'd463c695db2f3365d033c4dc3d189b9f532a91730b2eb1c86c27c651c52f20f6'),
                    'provider' => \Ripoti\Services\Sms\AfricasTalking::class
                ],

                'log' => [
                    'provider' => \Ripoti\Services\Sms\Log::class
                ],

            ],

        ],

        "mail" => [
            "mailTo" => env('MAIL_TO',''),

             "channel" => \Kinatech\BugClasper\Channels\MailChannel::class,
        ]
    ],
];
