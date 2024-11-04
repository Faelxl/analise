<?php
session_start();
include_once("config.php");

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}

// Execute a consulta
$sql = "SELECT * FROM servico";
$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Nossos Serviços</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image: url('./img/Captura\ de\ tela\ 2024-08-05\ 145526.png');
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed;
            background-repeat: no-repeat; 
            height: 100vh; 
            align-items: center;
            padding: 20px;
        }
        nav {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .services-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #e8e3e3;
            margin-bottom: 20px;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .service-item {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .service-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .service-item h3 {
            margin: 15px 0 10px;
            color: #333;
        }
        .service-item p {
            padding: 0 15px 15px;
            color: #666;
        }
        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>
</head>
<body>
    <nav>
        <h2 class="logo">Nice<span>Hair</span></h2><!-- Logo -->
        <ul class="cabeçalho-link">
        <li><a href="inxex.php">Início</a></li>
            <li><a href="serviços.php">Serviços</a></li>
            <li><a href="horarios.php">Horarios</a></li>
            <li><a href="contato.php">Contato</a></li>

            <?php 
            if (empty($_SESSION['email'])) {
                echo "<a href ='login.php' class='btn'>Logar</a>";
            } else {
                echo "<a href='logout.php' class='btn btn-danger me-5'>logout</a>";
            }
        ?>
    </nav>

    <div class="services-container">
        <h1>Nossos Serviços</h1>
        <div class="services-grid">
            <?php
            // Verifica se há resultados e exibe os serviços
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="service-item">';
                    echo '<img src="' . $row['imagem'] . '">';
                    echo '<h3>' . $row['nome_servico'] . '</h3>';
                    echo '<p>' . $row['descricao'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhum serviço encontrado.</p>';
            }
            ?>
        </div>
    </div>

</body>
</html>
