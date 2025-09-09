<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Category.php';

class PostController {
    private $postModel;
    private $categoryModel;

    public function __construct() {
        $this->postModel = new Post();
        $this->categoryModel = new Category();
    }

    // Yazı listesi
    public function index() {
        $posts = $this->postModel->getAll();
        include '../views/posts/index.php';
    }

    // Yazı ekleme formu
    public function create() {
        $categories = $this->categoryModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            if (!empty($title) && !empty($content)) {
                if ($this->postModel->create($title, $content, $category_id)) {
                    header('Location: posts.php?message=success');
                    exit;
                }
            }
        }
        include '../views/posts/create.php';
    }

    // Yazı düzenleme
    public function edit($id) {
        $post = $this->postModel->getById($id);
        $categories = $this->categoryModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            if (!empty($title) && !empty($content)) {
                if ($this->postModel->update($id, $title, $content, $category_id)) {
                    header('Location: posts.php?message=updated');
                    exit;
                }
            }
        }
        include '../views/posts/edit.php';
    }

    // Yazı silme
    public function delete($id) {
        if ($this->postModel->delete($id)) {
            header('Location: posts.php?message=deleted');
        } else {
            header('Location: posts.php?message=error');
        }
        exit;
    }

    // Yazı detayı
    public function show($id) {
        $post = $this->postModel->getById($id);
        include '../views/posts/show.php';
    }
}
?>