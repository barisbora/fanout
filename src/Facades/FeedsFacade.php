<?php namespace barisbora\Fanout\Facades;

use Illuminate\Support\Facades\Facade;

class FanoutFacade extends Facade
{

    protected static function getFacadeAccessor ()
    {
        return 'Fanout';
    }

}
