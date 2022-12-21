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
        $dir = substr(__DIR__,0,-14);

        $backtrace =  $exception->getTraceAsString();
        $backtrace = str_replace([$dir],"", $backtrace);
        $backtrace = preg_replace('^(.*vendor.*)\n^','',$backtrace);

        $line = $exception->getLine();
        $file = $exception->getFile();
        $exceptionClass = get_class($exception);
        $time = Carbon::now()->toDayDateTimeString();
        $exceptionMessage = $exception->getMessage();

        $projectName = env('APP_NAME');
        $phpVersion = phpversion();
        $serverName = php_uname('n');
        $root = base_path();
        $ip = gethostbyname(gethostname());
        $os = php_uname('s');
        $osVersion = php_uname('r');

        $message = "
        :red_circle: *$exceptionClass on $projectName*  :exclamation:
        \n:black_small_square: $exceptionMessage

         ```
         \nFile: $file \nLine: $line\nTrace: $backtrace\n\nTags\n• OS : $os \n• OS Version : $osVersion \n• Server Name : $serverName \n• PHP Runtime : $phpVersion \n• Path => $root \n• IP : $ip \n
         ```
         \n`Reported at: $time`
        ";

        Notification::route('slack', $config['webHookUrl'])
            ->notify(new SlackNotice($message));
    }
}
