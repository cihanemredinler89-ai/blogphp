<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>

<div class="card">
    <h2>Yazı Düzenle</h2>
    
    <?php if ($post): ?>
        <form method="POST">
            <div class="form-group">
                <label for="title">Başlık *</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="<?php echo htmlspecialchars($post['title']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Kategori Seçin</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" 
                                <?php echo $category['id'] == $post['category_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="content">İçerik *</label>
                <textarea class="form-control" id="content" name="content" rows="8" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>
            
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Güncelle</button>
                <a href="posts.php" class="btn">İptal</a>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">Yazı bulunamadı!</div>
        <a href="posts.php" class="btn">Yazılara Dön</a>
    <?php endif; ?>
</div>

</div>
</body>
</html>