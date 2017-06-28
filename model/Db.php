<?php

namespace model;
class Db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // highly recommended
                \PDO::ATTR_EMULATE_PREPARES => false // ALWAYS! ALWAYS! ALWAYS!
            ];
            $dbname = 'pgsql:' . 'host=' . Config::read('db.host') . ';' . 'port=' . Config::read('db.port') . ';' . 'dbname=' . Config::read('db.basename');
            self::$instance = new \PDO($dbname, Config::read('db.user'), Config::read('db.password'), $options);
        }
        return self::$instance;
    }

    private function __clone()
    {
    }
}
