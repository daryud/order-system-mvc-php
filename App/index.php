<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/ViewController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/ClientController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/ProductController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Controllers/OrderController.php');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        ViewController::index();
        break;
    case '/cliente':
        ViewController::client();
        break;
    case '/produto':
        ViewController::product();
        break;
    case '/pedido':
        ViewController::order();
        break;
    case '/cliente/registrar':
        ClientController::register($_POST['name'], $_POST['cpf']);
        break;
    case '/produto/registrar':
        ProductController::register($_POST['description'], $_POST['price'], $_POST['unity']);
        break;
    case '/pedido/registrar':
        OrderController::register($_POST['clientId'], $_POST['items'], $_POST['total']);
        break;
    default:
        ViewController::notFound();
        break;
}
