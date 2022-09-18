<?php

define('HOST', 'localhost');
define('DATABASENAME', 'coletek-<higor>');
define('USER', 'darin');
define('PASSWORD', '6811');

class ConnectDatabase
{
    protected $connection;

    function __construct()
    {
        $this->connect();
    }

    function connect()
    {
        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASENAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Error! " . $error->getMessage();
            die();
        }
    }
}
