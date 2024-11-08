<?php
session_start();
include_once("config.php");

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image: url('./img/Captura\ de\ tela\ 2024-08-05\ 145526.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            height: 100vh;
        }
        center{
            padding-top: 10vw;
        }
        .contact-container {
            background-color: #e9a30d;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            margin-top: 0;
            color: #333;
        }
        p {
            margin: 10px 0;
            font-size: 16px;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .contact-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h2 class="logo">Nice<span>Hair</span></h2><!--Logo-->
        <ul class="cabeçalho-link">
        <li><a href="inxex.php">Início</a></li>
            <li><a href="serviços.php">Serviços</a></li>
            <li><a href="horarios.php">Horarios</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul><!--cabeçalho-link-->
        <?php 
    if (empty($_SESSION['email'])) {
        echo "<a href ='login.php' class='btn'>Logar</a>";
    } else {
        echo "<a href='logout.php' class='btn btn-danger me-5'>logout</a>";
    }
        ?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    
    </nav>

<center>
    <div class="contact-container">
        <h1>Informações de Contato</h1>
        <div class="contact-info">
           
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/5545999029734" target="_blank">5545999029734</a></p>
            <p><strong>Instagram:</strong> <a href="https://www.instagram.com/@nice_hair" target="_blank">@nice_hair</a></p>
            <p><strong>E-mail:</strong> <a href="nicehair@gmail.com">nicehair@gmail.com</a></p>
       
        </div>
</center>
    </div>
</body>
</html>
