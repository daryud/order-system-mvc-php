<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Configs/ConnectDatabase.php');

class ProductModel extends ConnectDatabase
{

    function __construct()
    {
        parent::__construct();
    }

    function register($description, $price, $unity)
    {
        try {
            $sql = "INSERT INTO produto (descricao, preco, unidade) VALUES (:descricao, :preco, :unidade)";
            $response = $this->connection->prepare($sql)->execute(array(
                ':descricao' => $description,
                ':preco' => $price,
                ':unidade' => $unity
            ));
        } catch (PDOException $error) {
            $response = "Error! " . $error->getMessage();
        }

        return $response;
    }

    function getAll()
    {
        try {
            $sql = "SELECT * FROM produto";

            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $response = $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $error) {
            $response = "Error! " . $error->getMessage();
        }

        return $response;
    }
}
