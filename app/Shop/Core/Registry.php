<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 18.06.2020
 * Time: 15:43
 */

namespace App\Shop\Core;


class Registry
{
    use SSingleton;
    
    protected static $properties = [];

    public function setProperty($key, $value)
    {
        self::$properties[$key] = $value;
    }

    public function getProperty($key)
    {
        return self::$properties[$key] ?? null;
    }

    public function getAllProperties()
    {
        return self::$properties;
    }

}