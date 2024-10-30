<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die("Postagem não encontrada.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <p><em>Criado em: <?= $post['created_at'] ?></em></p>
    <a href="index.php">Voltar</a>
</body>
</html>
