<?php

namespace Kinatech\BugClasper\Channels;

use Throwable;

class MailChannel implements ChannelInterface
{

    public function report(Throwable $exception, array $config = []): void
    {
        // TODO: Implement report() method.
    }
}
