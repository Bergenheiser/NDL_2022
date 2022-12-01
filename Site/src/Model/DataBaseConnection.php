<?php

class DataBaseConnection
{

    private static ?DatabaseConnection $instance = null;

    private PDO $pdo;

    public function __construct()
    {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        $this->pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        return static::getInstance()->pdo;
    }

    private static function getInstance(): DatabaseConnection
    {
        if (is_null(static::$instance))
            static::$instance = new DatabaseConnection();
        return static::$instance;
    }

}