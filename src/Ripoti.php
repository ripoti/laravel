<?php

namespace Ripoti;

use Throwable;

class Ripoti
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('ripoti');
    }

    public function report(Throwable $exception): void
    {
        $defaultConfigChannel = $this->config['channels'][$this->config['default']];

        (new $defaultConfigChannel['channel'])
            ->report($exception, $defaultConfigChannel);;
    }
}
