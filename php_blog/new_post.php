<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Nova Postagem</title>
</head>
<body>
    <h1>Criar Nova Postagem</h1>
    <form action="new_post.php" method="post">
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Conteúdo:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>

        <input type="submit" value="Publicar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
