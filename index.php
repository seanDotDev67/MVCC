<?php

require_once __DIR__ . '/controllers/StudentController.php';

$controller = new StudentController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        $controller->index();
        break;
}