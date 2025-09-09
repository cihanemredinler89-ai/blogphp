<?php
require_once __DIR__ . '/../config/database.php';

class Post {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    // Tüm yazıları kategori bilgisiyle getir
    public function getAll() {
        $stmt = $this->pdo->query("
            SELECT p.*, c.name as category_name 
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            ORDER BY p.created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ID ile yazı getir
    public function getById($id) {
        $stmt = $this->pdo->prepare("
            SELECT p.*, c.name as category_name 
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            WHERE p.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Yeni yazı ekle
    public function create($title, $content, $category_id) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, category_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $content, $category_id]);
    }

    // Yazı güncelle
    public function update($id, $title, $content, $category_id) {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = ?, content = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $category_id, $id]);
    }

    // Yazı sil
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>