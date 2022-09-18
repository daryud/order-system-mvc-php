<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Configs/ConnectDatabase.php');

class ClientModel extends ConnectDatabase
{

    function __construct()
    {
        parent::__construct();
    }

    function register($name, $cpf)
    {
        try {
            $sql = "INSERT INTO cliente (nome, cpf) VALUES (:nome, :cpf)";
            $response = $this->connection->prepare($sql)->execute(array(
                ':nome' => $name,
                ':cpf' => $cpf
            ));
        } catch (PDOException $error) {
            $response = "Error! " . $error->getMessage();
        }

        return $response;
    }

    function getAll()
    {
        try {
            $sql = "SELECT * FROM cliente";

            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $response = $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $error) {
            $response = "Error! " . $error->getMessage();
        }

        return $response;
    }
}
