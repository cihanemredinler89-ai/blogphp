<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>

<div class="card">
    <h2>Yeni Kategori Ekle</h2>
    
    <form method="POST">
        <div class="form-group">
            <label for="name">Kategori Adı *</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        
        <div class="mt-2">
            <button type="submit" class="btn btn-success">Kaydet</button>
            <a href="categories.php" class="btn">İptal</a>
        </div>
    </form>
</div>

</div>
</body>
</html>