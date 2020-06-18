<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 18.06.2020
 * Time: 16:07
 */

namespace App\Shop\Core;


trait SSingleton
{
    private static $instance;

    public function instance()
    {
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}