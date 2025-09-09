<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>

<div class="card">
    <h2>Kategori Düzenle</h2>
    
    <?php if ($category): ?>
        <form method="POST">
            <div class="form-group">
                <label for="name">Kategori Adı *</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="<?php echo htmlspecialchars($category['name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Açıklama</label>
                <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
            </div>
            
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Güncelle</button>
                <a href="categories.php" class="btn">İptal</a>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">Kategori bulunamadı!</div>
        <a href="categories.php" class="btn">Kategorilere Dön</a>
    <?php endif; ?>
</div>

</div>
</body>
</html>