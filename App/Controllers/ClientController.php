<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Models/ClientModel.php');

class ClientController
{

    static function register($name, $cpf)
    {
        $model = new ClientModel();
        $response = $model->register($name, $cpf);

        header('location: /');

        return $response;
    }

    static function getAll()
    {
        $model = new ClientModel();
        $response = $model->getAll();

        return $response;
    }
}
