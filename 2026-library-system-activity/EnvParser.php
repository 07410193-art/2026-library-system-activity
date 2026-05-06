<?php

class EnvParser
{
    public static function getEnv($key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}


