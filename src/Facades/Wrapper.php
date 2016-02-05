<?php

namespace Gregoriohc\LaravelPlesk\Facades;

use Illuminate\Support\Facades\Facade;

class Wrapper extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'plesk'; }

}