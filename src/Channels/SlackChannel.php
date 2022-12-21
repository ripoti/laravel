<?php
namespace Ripoti\Channels;

use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Ripoti\Notifications\SlackNotice;
use Throwable;

class SlackChannel implements ChannelInterface
{

    public function report(Throwable $exception, array $config = []): void
    {
        $exceptionClass = get_class($exception);
        $time = Carbon::now()->toDayDateTimeString();
        $exceptionMessage = $exception->getMessage();
        $exceptionTrace = $exception->getTraceAsString();
        $projectName = env('APP_NAME');
        $phpVersion = phpversion();
        $serverName = php_uname('n');
        $root = base_path();
        $ip = gethostbyname(gethostname());
        $os = php_uname('s');
        $osVersion = php_uname('r');

        $message = "
        :exclamation: *$exceptionClass*. on _ $projectName _
        \n$exceptionMessage
        \nReported at: _ $time _
         ``` Trace\n$exceptionTrace\n\nTags\n• OS : $os \n• OS Version : $osVersion \n• Server Name : $serverName \n• PHP Runtime : $phpVersion \n• Path => $root \n• IP : $ip \n ```
        ";

        Notification::route('slack', $config['webHookUrl'])
            ->notify(new SlackNotice($message));
    }
}
