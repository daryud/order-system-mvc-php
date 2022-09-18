<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/ClientController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/ProductController.php');

class ViewController
{
    public static function index()
    {
        $pagePath = '/Views/Modules/HomeView.php';
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/Layout/Layout.php');
    }

    public static function client()
    {
        $pagePath = '/Views/Modules/RegisterClientView.php';
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/Layout/Layout.php');
    }

    public static function product()
    {
        $pagePath = '/Views/Modules/RegisterProductView.php';
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/Layout/Layout.php');
    }

    public static function order()
    {
        $clients = ClientController::getAll();
        $products = ProductController::getAll();
        $pagePath = '/Views/Modules/RegisterOrderView.php';
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/Layout/Layout.php');
    }

    public static function notFound()
    {
        $pagePath = '/Views/Modules/NotFoundView.php';
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/Layout/Layout.php');
    }
}
