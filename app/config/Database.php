<?php namespace Config;

class Database
{
    private static $db = null;

    private function __construct()
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        self::$db = $db;
    }

    public static function get_instance()
    {
        static $instance = null;

        if (!$instance) {
            $instance = new static();
        }

        return $instance;
    }

    public static function get_db()
    {
        return self::$db;
    }
}