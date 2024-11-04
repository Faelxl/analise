<?php 
session_start();
include_once("config.php");

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process registration form submission
if (isset($_POST['submit'])) {
    // Sanitize user input
    $nome = sanitizeInput($_POST['nome']);
    $email = sanitizeInput($_POST['email']);
    $senha = sanitizeInput($_POST['senha']);

    // Prepare SQL statement
    $sql = "INSERT INTO usuários (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sss', $nome, $email, $senha);

    if ($stmt->execute()) {
        // Automatically log in the user after registration
        $_SESSION['email'] = $email; // Use the email just registered
        $_SESSION['senha'] = $senha;  // Use the password just registered
        
        // Verifica o tipo de usuário se necessário, por exemplo:
        // $_SESSION['tipo'] = 0; // Ou qualquer lógica que você tenha
        
        // Redireciona para a página de acordo com o tipo de usuário
        header("Location: horarios.php"); // Ou a página que você deseja
        exit();
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('./img/Captura\ de\ tela\ 2024-08-05\ 145526.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #d1ab00;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #00b2d1;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cadastro</h2>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
