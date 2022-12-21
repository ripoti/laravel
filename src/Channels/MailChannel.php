<?php

namespace Repoti\Channels;

use Throwable;

class MailChannel implements ChannelInterface
{

    public function report(Throwable $exception, array $config = []): void
    {
        // TODO: Implement report() method.
    }
}
