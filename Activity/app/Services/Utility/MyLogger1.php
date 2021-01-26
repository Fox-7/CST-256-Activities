<?php
namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger1 implements ILogger
{

    static function getLogger()
    {}

    public static function debug($message, $data = array())
    {
        self::getLogger()->debug($message, $data);
    }
    
    public static function info($message, $data = array())
    {
        self::getLogger()->info($message, $data);
    }
    
    public static function warning($message, $data = array())
    {
        self::getLogger()->warning($message, $data);
    }
    
    public static function error($message, $data = array())
    {
        self::getLogger()->error($message, $data);
    }
}