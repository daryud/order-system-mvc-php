<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Models/ProductModel.php');

class ProductController
{

    static function register($description, $price, $unity)
    {
        $model = new ProductModel();
        $response = $model->register($description, $price, $unity);

        header('location: /');

        return $response;
    }

    static function getAll()
    {
        $model = new ProductModel();
        $response = $model->getAll();

        return $response;
    }
}
