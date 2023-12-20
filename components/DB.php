<?php

class DB
{
    private static $connection;

    public function __construct($dsn, $user, $password)
    {
        self::$connection = new PDO($dsn, $user, $password);
    }

    public static function getConnection() {
        try {
            if (!self::$connection) {
                throw new Exception("Error connection to DB!");
            } else {
                return self::$connection;
            }
        } catch (Exception $e) {
            echo "Error: - " . $e->getMessage();
            die();
        }
    }
}