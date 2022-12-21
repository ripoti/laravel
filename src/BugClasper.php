<?php

namespace Kinatech\BugClasper;

use Throwable;

class BugClasper
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('bugClasper');
    }

    public function report(Throwable $exception): void
    {
        $defaultConfigChannel = $this->config['channels'][$this->config['default']];

        (new $defaultConfigChannel['channel'])
            ->report($exception, $defaultConfigChannel);;
    }
}
