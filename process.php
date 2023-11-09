<?php
// use Controller/RoomController;
// use Controller/UserController;

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($controller) {
    case 'user':
        include_once 'controller/UserController.php';
        $objController = new UserController();
        break;
    case 'room':
        include_once 'controller/RoomController.php';
        $objController = new RoomController();
        break;
    case 'categorie':
        include_once 'controller/CategorieController.php';
        $objController = new CategorieController();
        break;
    case 'service':
        include_once 'controller/ServiceController.php';
        $objController = new ServiceController();
        break;
    case 'order':
        include_once 'controller/OrderController.php';
        $objController = new OrderController();
        break;
}
switch ($action) {
    case 'index':
        $objController->index();
        break;
    case 'show':
        $objController->show();
        break;
    case 'create':
        $objController->create();
        break;
    case 'store':
        $objController->store();
        break;
    case 'edit':
        $objController->edit();
        break;
    case 'update':
        $objController->update();
        break;
    case 'destroy':
        $objController->destroy();
        break;
    case 'search':
        $objController->search();
        break;
}
