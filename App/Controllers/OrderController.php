<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Models/OrderModel.php');

class OrderController
{

    static function register($clientId, $items, $total)
    {

        $model = new OrderModel();
        $response = $model->register(intval($clientId), json_decode($items), floatval($total));

        header('location: /');

        return $response;
    }
}
