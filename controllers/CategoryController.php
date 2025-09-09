<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    // Kategori listesi
    public function index() {
        $categories = $this->categoryModel->getAll();
        include '../views/categories/index.php';
    }

    // Kategori ekleme formu
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if (!empty($name)) {
                if ($this->categoryModel->create($name, $description)) {
                    header('Location: categories.php?message=success');
                    exit;
                }
            }
        }
        include '../views/categories/create.php';
    }

    // Kategori düzenleme
    public function edit($id) {
        $category = $this->categoryModel->getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if (!empty($name)) {
                if ($this->categoryModel->update($id, $name, $description)) {
                    header('Location: categories.php?message=updated');
                    exit;
                }
            }
        }
        include '../views/categories/edit.php';
    }

    // Kategori silme
    public function delete($id) {
        if ($this->categoryModel->delete($id)) {
            header('Location: categories.php?message=deleted');
        } else {
            header('Location: categories.php?message=error');
        }
        exit;
    }
}
?>