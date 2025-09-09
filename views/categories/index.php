<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>

<?php
// Mesajları göster
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    if ($message === 'success') {
        echo '<div class="alert alert-success">Kategori başarıyla eklendi!</div>';
    } elseif ($message === 'updated') {
        echo '<div class="alert alert-success">Kategori başarıyla güncellendi!</div>';
    } elseif ($message === 'deleted') {
        echo '<div class="alert alert-success">Kategori başarıyla silindi!</div>';
    } elseif ($message === 'error') {
        echo '<div class="alert alert-danger">Bir hata oluştu!</div>';
    }
}
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2>Kategoriler</h2>
        <a href="categories.php?action=create" class="btn btn-success">Yeni Kategori</a>
    </div>

    <?php if (empty($categories)): ?>
        <p>Henüz kategori eklenmemiş.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Adı</th>
                    <th>Açıklama</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category['id']); ?></td>
                        <td><?php echo htmlspecialchars($category['name']); ?></td>
                        <td><?php echo htmlspecialchars($category['description'] ?? '-'); ?></td>
                        <td><?php echo date('d.m.Y H:i', strtotime($category['created_at'])); ?></td>
                        <td>
                            <a href="categories.php?action=edit&id=<?php echo $category['id']; ?>" class="btn btn-warning">Düzenle</a>
                            <a href="categories.php?action=delete&id=<?php echo $category['id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('Bu kategoriyi silmek istediğinizden emin misiniz?')">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</div>
</body>
</html>