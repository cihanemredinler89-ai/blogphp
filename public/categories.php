<?php
require_once '../controllers/CategoryController.php';

$controller = new CategoryController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        } else {
            header('Location: categories.php');
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: categories.php');
        }
        break;
    default:
        $controller->index();
        break;
}
?>