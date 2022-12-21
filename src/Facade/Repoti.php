<?php

namespace  Repoti\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void report(\Exception $exception)
 */

class Repoti extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'repoti';
    }
}
