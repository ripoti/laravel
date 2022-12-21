<?php

namespace  Kinatech\BugClasper\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void report(\Exception $exception)
 */

class BugClasper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bugClasper';
    }
}
