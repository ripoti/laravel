<?php

namespace Repoti;

use Throwable;

class Repoti
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('repoti');
    }

    public function report(Throwable $exception): void
    {
        $defaultConfigChannel = $this->config['channels'][$this->config['default']];

        (new $defaultConfigChannel['channel'])
            ->report($exception, $defaultConfigChannel);;
    }
}
