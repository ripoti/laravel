<?php
namespace Ripoti\Channels;

use Throwable;

interface ChannelInterface
{
    public function report(Throwable $exception, array $config = []): void;
}
