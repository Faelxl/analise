<?php
$login_status = "  ";
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    #com acesso

    function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    include_once("config.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM `usuários` WHERE email=? AND senha=?");
    $stmt->bind_param("ss", $email, $senha);


    //print_r($sql."<br>");
    //print_r($result);
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifica o tipo de usuário
            if ($row['tipo'] == 1) {
                // Login válido para administrador, redireciona para adm.php
                header("Location: adm.php");
            } else {
                // Login válido para outro tipo de usuário, redireciona para home
                header("Location: cardapio.php");
            }
        } else {
            echo "Email ou senha inválidos.";
        }
    } else {
        // Trata erros na execução da consulta
        echo "Erro ao realizar a consulta: " . $stmt->error;
    }

    $stmt->close();

}
else{
    #sem acesso
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
           
        }
        h1 {
            margin-top: 0;
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
        }
        button:hover {
            background-color: #d1ab00;
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
            <label for="username">Cadastre-se</label>
            <input type="text" id="username" name="email" placeholder="email">
            <label for="password">Senha</label>
            <input type="password" id="password" name="senha" placeholder="Senha">
            <button type="submit" name="submit">Enviar</button>
    
        </form>
        <br>
        <a href="./cadastro.php"><button href="./cadastro.php">cadastro</button></a>
        
</body>
</html>
