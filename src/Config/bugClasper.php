<?php

return [

    'default' => env('BUG_CLASPER_CHANNEL', 'slack'),

    "channels" => [
        "slack" => [
            "webHookUrl" => env('SLACK_WEBHOOK_URL', ''),
            "channel" => \Kinatech\BugClasper\Channels\SlackChannel::class
        ],

        "sms" => [
            'default' => env('SMS_PROVIDER', 'africas_talking'),

            "channel" => \Kinatech\BugClasper\Channels\SmsChannel::class,

            'providers' => [
                'africas_talking' => [
                    'username' => env('AT_USERNAME', 'sandbox'),
                    'apiKey' => env('AT_API_KEY', 'd463c695db2f3365d033c4dc3d189b9f532a91730b2eb1c86c27c651c52f20f6'),
                    'provider' => Kinatech\BugClasper\Services\Sms\AfricasTalking::class
                ],

                'log' => [
                    'provider' => Kinatech\BugClasper\Services\Sms\Log::class
                ],

            ],

        ],

        "mail" => [
            "mailTo" => env('MAIL_TO',''),

             "channel" => \Kinatech\BugClasper\Channels\MailChannel::class,
        ]
    ],
];
