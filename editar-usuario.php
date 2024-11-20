<?php
include 'conexao.php';
 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
 
    
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); 
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
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
 
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
    <title>Ediçao</title>
    <style>
      
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1c1c4d, #2874a6);
            color:  #2a2a72,#009ffd;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
 
      
        form {
            max-width: 500px;
            width: 100%;
            background: linear-gradient(135deg, #2a2a72, #009ffd);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
 
        form h2 {
            text-align: center;
            font-size: 26px;
            color: #f7dc6f;
            margin-bottom: 20px;
        }
 
        form label {
            display: block;
            font-size: 16px;
            color: #fff;
            margin-bottom: 5px;
        }
 
        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            outline: none;
            transition: all 0.3s ease-in-out;
        }
 
        form input[type="text"]:focus,
        form input[type="email"]:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #f7dc6f;
        }
 
        form button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background: #f39c12;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 10px;
        }
 
        form button:hover {
            background: #d35400;
        }
 
        form a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #f39c12;
            font-size: 16px;
            margin-top: 10px;
            transition: color 0.3s ease;
        }
 
        form a:hover {
            color: #d35400;
        }
 
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }
 
            form h2 {
                font-size: 22px;
            }
 
            form button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Edição Usuário</h2>
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
