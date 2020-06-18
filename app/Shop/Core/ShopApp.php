<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 18.06.2020
 * Time: 15:52
 */

namespace App\Shop\Core;


class ShopApp
{
    public static $app;

    public function getInstance()
    {
        self::$app = (new Registry)->instance();//singleton
        self::getConfigs();
        return self::$app;
    }

    protected static function getConfigs(){
        $configs = require CONF . '/config.php';

        if (!empty($configs)){
            foreach ($configs as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }

}