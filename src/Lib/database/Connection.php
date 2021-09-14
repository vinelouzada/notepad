<?php
namespace Louzada\NotePad\Lib\Database;

abstract class Connection
{
    private static $connection;

    public static function connectionDB()
    {
        if (self::$connection == null){
            self::$connection = new \PDO('sqlite:'.__DIR__.'/../../../bd.sqlite');
        }
        return self::$connection;
    }
}