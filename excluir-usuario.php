<?php
include 'conexao.php';
 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
 
    $sql = "DELETE FROM usuarios WHERE id = $id";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário excluído com sucesso!');</script>";
        echo "<script>window.location.href = 'listar-usuario.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir o usuário: " . $conn->error . "');</script>";
        echo "<script>window.location.href = 'listar-usuario.php';</script>";
    }
}
 
$conn->close();
?>