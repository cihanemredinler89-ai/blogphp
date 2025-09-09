<?php $title = "Kategoriler"; include __DIR__ . '/../includes/header.php'; ?>

<div class="card">
    <?php if ($post): ?>
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
        <p class="text-muted mb-2">
            Kategori: <?php echo htmlspecialchars($post['category_name'] ?? 'Kategorisiz'); ?> | 
            <?php echo date('d.m.Y H:i', strtotime($post['created_at'])); ?>
        </p>
        <hr>
        <div style="line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </div>
        <hr>
        <div class="mt-2">
            <a href="posts.php" class="btn">Yazılara Dön</a>
            <a href="posts.php?action=edit&id=<?php echo $post['id']; ?>" class="btn btn-warning">Düzenle</a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Yazı bulunamadı!</div>
        <a href="posts.php" class="btn">Yazılara Dön</a>
    <?php endif; ?>
</div>

</div>
</body>
</html>