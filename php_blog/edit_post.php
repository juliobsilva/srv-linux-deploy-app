<?php
include 'db.php';

// Verifica se o ID da postagem foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Busca a postagem existente
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Postagem não encontrada.");
    }
} else {
    die("ID da postagem não fornecido.");
}

// Atualiza a postagem se o formulário for submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);

    // Redireciona de volta para a página principal após a atualização
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Postagem</title>
</head>
<body>
    <h1>Editar Postagem</h1>
    <form action="edit_post.php?id=<?= $post['id'] ?>" method="post">
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br><br>

        <label for="content">Conteúdo:</label><br>
        <textarea id="content" name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea><br><br>

        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php
