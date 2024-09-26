<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header> 
</header>
<div class='cards'>
<?php
include_once('config.php');
$sql = "SELECT * FROM servico";
$result = $conexao->query($sql);
if (mysqli_num_rows($result) >= 1){

    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      echo "<section class='card'>";
      echo "<div> <h1 class='card_titulo'> ID serviço: " . $row["id_servico"] . "</h1></div>";
      echo "<div> <center><img src='" . $row["imagem"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
      echo "<div class='card_texto'>  Nome do serviço: " . $row["nome_servico"] . "</div>";
      echo "<div class='card_texto'> Descrição: " . $row["descricao"] . "</div>";
      echo "</section>";  

    }
} else {
    echo "0 resultados";
}

?>
</div>
</body>
</html>