<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $item = $_POST['item'];
    $quantidade = $_POST['quantidade'];
    $unidade = $_POST['unidade'];
    $validade = $_POST['validade'];

    if ($id) {
        // Atualizar item
        $stmt = $pdo->prepare("UPDATE estoque SET item = ?, quantidade = ?, unidade = ?, validade = ? WHERE id = ?");
        $stmt->execute([$item, $quantidade, $unidade, $validade, $id]);
    } else {
        // Inserir novo item
        $stmt = $pdo->prepare("INSERT INTO estoque (item, quantidade, unidade, validade) VALUES (?, ?, ?, ?)");
        $stmt->execute([$item, $quantidade, $unidade, $validade]);
    }

    header('Location: index.php');
    exit;
}
?>