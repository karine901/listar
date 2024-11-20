<?php
include 'conexao.php';
include 'navbar.php';
 
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <style>

body {
    font-family: 'Roboto', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
    color: #333;
}
 

.navbar {
    background: linear-gradient(90deg, #007BFF, #0056b3);
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
}
 
.navbar-container span {
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 0.5px;
}
 
.btn-sair {
    text-decoration: none;
    color: white;
    background-color: #FF5733;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}
 
.btn-sair:hover {
    background-color: #C70039;
    transform: scale(1.1);
}
 
h2 {
    text-align: center;
    margin: 30px 0;
    color: #007BFF;
    font-size: 2rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}
 
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
}
 
th, td {
    padding: 15px 20px;
    border: 1px solid #ddd;
    text-align: center;
}
 
th {
    background: linear-gradient(90deg, #007BFF, #0056b3);
    color: white;
    font-size: 1.1rem;
    font-weight: bold;
    text-transform: uppercase;
}
 
tr:nth-child(even) {
    background-color: #f9f9f9;
}
 
tr:hover {
    background-color: #e6f7ff;
    transition: background-color 0.3s ease;
}
 
a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
    transition: color 0.3s ease, transform 0.2s;
}
 
a:hover {
    color: #0056b3;
    transform: scale(1.05);
    text-decoration: underline;
}
 

a.editar {
    background-color: #28a745;
    color: white;
    padding: 8px 15px;
    border-radius: 6px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
 
a.editar:hover {
    background-color: #218838;
    transform: scale(1.1);
}
 
a.excluir {
    background-color: #dc3545;
    color: white;
    padding: 8px 15px;
    border-radius: 6px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
 
a.excluir:hover {
    background-color: #c82333;
    transform: scale(1.1);
}
 
@media (max-width: 768px) {
    th, td {
        padding: 10px;
        font-size: 0.9rem;
    }
 
    .btn-sair {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}
 
@media (max-width: 480px) {
    table {
        font-size: 0.8rem;
    }
 
    .btn-sair {
        padding: 6px 10px;
        font-size: 0.8rem;
    }
}
    </style>
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
                    echo "<td><a href='excluir-usuario.php?id=" . $row['id'] . "' class='excluir' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\">Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Nenhum usuário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
 