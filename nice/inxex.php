<?php
session_start(); // Inicia a sessão para armazenar os itens do carrinho
include_once('config.php');
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
// Consulta para obter os produtos do banco de dados
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nice Hair</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="img" href="img/Captura de tela 2024-08-05 145526.png">
    
</head>
<body>
	 <!---Cabeçalho-Main-->

    <div class="background">
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
            
        
        </nav>

        <div class="Main">
            <h4>Ola, bem-vindos a</h4>
            <h1>Nice <span>Hair</span></h1>
            <h3>Cadastre-se </h3>
            <div class="Container-btn">
                <form>
                    <input type="email" nome="email" id="mail" placeholder="Email">
                    <input type="submit" name="submit" value="Começar">
                </form>
            </div><!--Container-btn-->
        </div><!--Main-->
    </div><!--background-->

   


</body>
</html>