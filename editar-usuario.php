<?php
include 'conexao.php';
 
// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Obtém o ID da URL e o converte em número inteiro
 
    // Consulta o banco de dados para recuperar os dados do usuário
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); // Obtém os dados do usuário
    } else {
        echo "<script>alert('Usuário não encontrado.');</script>";
        echo "<script>window.location.href = 'listar-usuario.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID não fornecido.');</script>";
    echo "<script>window.location.href = 'listar-usuario.php';</script>";
    exit;
}
 
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
 
    // Atualiza os dados do usuário no banco
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', cargo = '$cargo' WHERE id = $id";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário atualizado com sucesso!');</script>";
        echo "<script>window.location.href = 'listar-usuario.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o usuário: " . $conn->error . "');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
        
form {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}
 
form h2 {
    text-align: center;
    color: #4CAF50;
    font-size: 24px;
    margin-bottom: 20px;
}
 
form label {
    font-weight: bold;
    display: block;
    margin-bottom: 8px;
    color: #333;
}
 
form input[type="text"],
form input[type="email"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}
 
form input[type="text"]:focus,
form input[type="email"]:focus {
    background-color: #e8f0fe;
    border-color: #4CAF50;
    outline: none;
}
 
form button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    display: block;
    width: 100%;
    margin-bottom: 10px;
    transition: background-color 0.3s ease;
}
 
form button:hover {
    background-color: #45a049;
}
 
form a {
    text-decoration: none;
    display: block;
    text-align: center;
    color: #4CAF50;
    margin-top: 10px;
    font-size: 16px;
    transition: color 0.3s ease;
}
 
form a:hover {
    color: #388e3c;
}
 
/* Responsividade */
@media (max-width: 600px) {
    form {
        padding: 15px 20px;
    }
 
    form h2 {
        font-size: 20px;
    }
 
    form input[type="text"],
    form input[type="email"] {
        padding: 10px;
    }
 
    form button {
        padding: 10px 15px;
        font-size: 14px;
    }
} 
    </style>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        <br>
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo $usuario['cargo']; ?>" required>
        <br>
        <button type="submit">Salvar</button>
        <a href="listar-usuario.php">Cancelar</a>
    </form>
</body>
</html>
