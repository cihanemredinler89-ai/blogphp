<?php
require_once '../controllers/PostController.php';

$controller = new PostController();
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
            header('Location: posts.php');
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        } else {
            header('Location: posts.php');
        }
        break;
    case 'show':
        if ($id) {
            $controller->show($id);
        } else {
            header('Location: posts.php');
        }
        break;
    default:
        $controller->index();
        break;
}
?>