<?php
session_start();
$login_status = "";

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    function sanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    include_once("config.php");

    // Sanitizando os dados
    $email = sanitizeInput($_POST['email']);
    $senha = sanitizeInput($_POST['senha']);

    $stmt = $conexao->prepare("SELECT * FROM `usuários` WHERE email=? AND senha=?");
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifica o tipo de usuário
            if ($row['tipo'] == 1) {
            $_SESSION['email'] = $row['email'];
                header("Location: adm.php"); // Redireciona para administrador
            } else {
            $_SESSION['email'] = $row['email'];
                header("Location: horarios.php"); // Redireciona para horários
            }
            exit(); // Adicionado para garantir que o script pare após o redirecionamento
        } else {
            $login_status = "Email ou senha inválidos.";
        }
    } else {
        $login_status = "Erro ao realizar a consulta: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Tela de Login</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        background-image: url('./img/Captura\ de\ tela\ 2024-08-05\ 145526.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        padding: 40px;
        border-radius: 15px;
        color: #fff;
        width: 100%;
        max-width: 400px;
        background-color: rgba(0, 0, 0, 0.6); 
    }

    h1 {
        margin-top: 0;
        text-align: center;
    }

    input {
        padding: 15px;
        border: none;
        outline: none;
        font-size: 15px;
        width: 100%;
        margin-bottom: 15px;
        border-radius: 5px;
        box-sizing: border-box;
        background-color: #fff;
        color: #000;
    }

    button {
        background-color: #d1ab00;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s; /* Suavizando a transição de hover */
    }

    button:hover {
        background-color: #b98f00; /* Alterando a cor de hover */
    }

    @media (max-width: 600px) {
        .login-container {
            padding: 20px;
        }
    }
</style>

</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="email" required>
            <label for="password">Senha</label>
            <input type="password" id="password" name="senha" placeholder="Senha" required>
            <button type="submit" name="submit">Enviar</button>
        </form>
        <br>
        <a href="./cadastro.php"><button>Cadastrar</button></a>
        <p><?php echo $login_status; ?></p> <!-- Mensagem de status do login -->
    </div>
</body>
</html>
