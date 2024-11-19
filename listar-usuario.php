<?php
include 'conexao.php';
include 'navbar.php';
 
// Consulta os usuários no banco de dados
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['cargo'] . "</td>";
                    echo "<td><a href='editar-usuario.php?id=" . $row['id'] . "'>Editar</a></td>";
                    echo "<td><a href='excluir-usuario.php?id=" . $row['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum usuário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>