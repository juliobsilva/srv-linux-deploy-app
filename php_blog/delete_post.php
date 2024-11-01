<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);

    // Redireciona de volta para a página principal após a exclusão
    header("Location: index.php");
    exit;
} else {
    echo "ID da postagem não fornecido.";
}
?>
