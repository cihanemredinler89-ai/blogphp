<?php $title = "Blog Yönetimi - Ana Sayfa"; include '../views/includes/header.php'; ?>

<div class="card">
    <h1>Blog Yönetim Sistemine Hoş Geldiniz</h1>
    <p>Bu basit blog yönetim sistemi ile kategoriler ve blog yazıları yönetebilirsiniz.</p>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
        <div class="card">
            <h3>Kategoriler</h3>
            <p>Blog yazıları için kategoriler oluşturun ve yönetin.</p>
            <a href="categories.php" class="btn">Kategorileri Yönet</a>
        </div>
        
        <div class="card">
            <h3>Blog Yazıları</h3>
            <p>Blog yazılarınızı oluşturun, düzenleyin ve yayınlayın.</p>
            <a href="posts.php" class="btn">Yazıları Yönet</a>
        </div>
    </div>
</div>

</div>
</body>
</html>