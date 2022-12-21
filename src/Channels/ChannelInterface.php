<?php
namespace Kinatech\BugClasper\Channels;

use Throwable;

interface ChannelInterface
{
    public function report(Throwable $exception, array $config = []): void;
}
