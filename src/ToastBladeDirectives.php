<?php

namespace Usernotnull\Toast;

/** @api */
class ToastBladeDirectives
{
    public static function toastScripts(string $expression): string
    {
        return '{!! \Usernotnull\Toast\ToastManager::scripts(' . $expression . ') !!}';
    }
}
