<?php
namespace Kinatech\BugClasper\Channels;

use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Kinatech\BugClasper\Notifications\SlackNotice;
use Throwable;

class SlackChannel implements ChannelInterface
{

    public function report(Throwable $exception, array $config = []): void
    {
        $time = Carbon::now()->toDateTimeString();
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
        :bangbang: *$exceptionMessage*.
        \n
        \nProject Name: $projectName
        \nDate: _ $time _
        \n
        \nAssignees: <@U01026LFKSP>
         ``` Trace\n$exceptionTrace\n\nTags\n• OS : $os \n• OS Version : $osVersion \n• Server Name : $serverName \n• PHP Runtime : $phpVersion \n• Path => $root \n• IP : $ip \n ```
        ";

        Notification::route('slack', $config['webHookUrl'])
            ->notify(new SlackNotice($message));
    }
}
