<?php
include 'db.php';

date_default_timezone_set('America/Sao_Paulo');

# $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$stmt = $pdo->query("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as formatted_created_at FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog da Fofoca</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Blog da Fofoca</h1>
        
        <div class="text-center mb-4">
            <a href="new_post.php" class="btn btn-primary">Criar Nova Fofoca</a>
        </div>
        
        <div class="list-group">
            <?php foreach ($posts as $post): ?>
                <div class="list-group-item mb-3">
                    <h2 class="h5">
                        <a href="post.php?id=<?= $post['id'] ?>" class="text-decoration-none"><?= htmlspecialchars($post['title']) ?></a>
                    </h2>
                    <p class="text-muted"><?= htmlspecialchars(substr($post['content'], 0, 100)) ?>...</p>
                    <p class="text-right"><em>Criado em: <?= date('d/m/Y H:i', strtotime($post['created_at'])) ?></em></p>
                    <div class="text-right">
                        <a href="delete_post.php?id=<?= $post['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar esta postagem?');">Deletar</a>
                        <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
