<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>
<?php
// Mesajları göster
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    if ($message === 'success') {
        echo '<div class="alert alert-success">Yazı başarıyla eklendi!</div>';
    } elseif ($message === 'updated') {
        echo '<div class="alert alert-success">Yazı başarıyla güncellendi!</div>';
    } elseif ($message === 'deleted') {
        echo '<div class="alert alert-success">Yazı başarıyla silindi!</div>';
    } elseif ($message === 'error') {
        echo '<div class="alert alert-danger">Bir hata oluştu!</div>';
    }
}
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2>Blog Yazıları</h2>
        <a href="posts.php?action=create" class="btn btn-success">Yeni Yazı</a>
    </div>

    <?php if (empty($posts)): ?>
        <p>Henüz yazı eklenmemiş.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="card" style="margin-bottom: 1rem;">
                <h3 class="mb-2"><?php echo htmlspecialchars($post['title']); ?></h3>
                <p class="text-muted mb-2">
                    Kategori: <?php echo htmlspecialchars($post['category_name'] ?? 'Kategorisiz'); ?> | 
                    <?php echo date('d.m.Y H:i', strtotime($post['created_at'])); ?>
                </p>
                <p><?php echo htmlspecialchars(substr($post['content'], 0, 200)) . '...'; ?></p>
                <div class="mt-2">
                    <a href="posts.php?action=show&id=<?php echo $post['id']; ?>" class="btn">Detay</a>
                    <a href="posts.php?action=edit&id=<?php echo $post['id']; ?>" class="btn btn-warning">Düzenle</a>
                    <a href="posts.php?action=delete&id=<?php echo $post['id']; ?>" 
                       class="btn btn-danger" 
                       onclick="return confirm('Bu yazıyı silmek istediğinizden emin misiniz?')">Sil</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</div>
</body>
</html>