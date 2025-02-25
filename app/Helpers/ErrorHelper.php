<?php

namespace App\Helpers;

class ErrorHelper
{
    public static function error(string $key): void
    {
        session()->flash('error', __($key));
    }
}
