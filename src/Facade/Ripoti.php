<?php

namespace  Ripoti\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void report(\Throwable $exception)
 */

class Ripoti extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ripoti';
    }
}
