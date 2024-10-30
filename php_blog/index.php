<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Blog</h1>
    <a href="new_post.php">Criar Nova Postagem</a>
    <hr>

    <?php foreach ($posts as $post): ?>
        <h2><a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
        <p><?= htmlspecialchars(substr($post['content'], 0, 100)) ?>...</p>
        <p><em>Criado em: <?= $post['created_at'] ?></em></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>
