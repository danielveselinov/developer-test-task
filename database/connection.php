<?php 

namespace MyApp\Connection;

use PDO;

class Connection
{
    private static $instance = null;
    private static $username = "root";
    private static $password = "";

    public static function connect()
    {
        if (is_null(self::$instance)) {
            try {
                $connection = new PDO("mysql:host=localhost;dbname=scandiweb", self::$username, self::$password);
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return $connection;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        
        return self::$instance;
    }

    public static function close()
    {
        self::$instance = null;
    }
}