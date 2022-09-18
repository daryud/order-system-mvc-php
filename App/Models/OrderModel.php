<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Configs/ConnectDatabase.php');

class OrderModel extends ConnectDatabase
{

    function __construct()
    {
        parent::__construct();
    }

    function register($clientId, $items, $total)
    {
        try {
            $sql = "INSERT INTO pedido (data, cod_cliente, total) VALUES (:data, :cod_cliente, :total)";
            $statement = $this->connection->prepare($sql);

            $date = date('Y-m-d');

            $statement->execute(array(
                ':data' => $date,
                ':cod_cliente' => $clientId,
                ':total' => $total
            ));

            $orderId = $this->connection->lastInsertId();

            foreach ($items as $item) {
                $sql = "INSERT INTO pedido_item (cod_pedido, cod_produto, unitario, quantidade, total) VALUES (:cod_pedido, :cod_produto, :unitario, :quantidade, :total)";

                $statement = $this->connection->prepare($sql);

                $statement->execute(array(
                    ':cod_pedido' => intval($orderId),
                    ':cod_produto' => intval($item->product->codigo),
                    ':unitario' => floatval($item->product->preco),
                    ':quantidade' => floatval($item->quantity),
                    ':total' => floatval($item->product->preco) * floatval($item->quantity)
                ));
            }

            $response = "Sucesso";
        } catch (PDOException $error) {
            $response = "Error! " . $error->getMessage();
        }

        return $response;
    }
}
