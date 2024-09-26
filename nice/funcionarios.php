<?php
if (isset($_POST['submit'])) 
    include_once("config.php");
    function conversordefloat($preco) {
        return floatval(str_replace(",", ".", $preco));
      }
// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process registration form submission
if (isset($_POST['submit'])) {

    function uploadImagem($foto) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($foto["name"]);
    
        if (move_uploaded_file($foto["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }
    // Sanitize user input
    $foto = $_FILES["foto"];
    $nome = sanitizeInput($_POST['nome_funcionario']);
    $cargo = sanitizeInput($_POST['cargo']);
    $salario = sanitizeInput(conversordefloat($_POST['salario']));

    $imagem_path = null;
    if (isset($foto) && $foto["error"] === 0) {
        $imagem_path = uploadImagem($foto);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    $sql = "INSERT INTO funcionarios (foto, nome_funcionario, cargo, salario) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssss', $imagem_path, $nome, $cargo, $salario);

    if ($stmt->execute()) {
        echo "<p class='mensagem'>cadastro de funcionário realizado </p>";
        header('location: funcionarios.php');
    } else {
        echo "<p class='error'>Falha ao cadastrar funcionário: " . $conexao->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
            flex-direction: column;
            height: 100vh;
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
    
<header> 
</header>
<div class='cards'>
<?php
include_once('config.php');
$sql = "SELECT * FROM funcionarios";
$result = $conexao->query($sql);
if (mysqli_num_rows($result) >= 1){

    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      echo "<section class='card'>";
      echo "<div> <center><img src='" . $row["foto"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
      echo "<div> <h2 class='card_titulo'> ID Funcionário: " . $row["id_funcionario"] . "</h2></div>";
      echo "<div class='card_texto'> <h2>  Nome do funcinário: " . $row["nome_funcionario"] . "</h2></div>";
      echo "<div class='card_texto'> <h2> Cargo: " . $row["cargo"] . "</h2></div>";
      echo "<div class='card_texto'> <h2> Salário: " . $row["salario"] . "</h2></div>";
      echo "</section>";  

    }
} else {
    echo "0 resultados";
}

?>
</div>
<br> <br> <br>
<div class="form-container">
        <h2>Cadastro</h2>
        <form action="funcionarios.php" method="post" enctype="multipart/form-data">
            <label for="foto">Nome do funcionário:</label>
            <input type="file" id="foto" name="foto" accept="/img" required>

            <label for="nome_funcionario">Nome do funcionário:</label>
            <input type="text" id="nome_funcionario" name="nome_funcionario" required>
            
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>
            
            <label for="salario">Salário:</label>
            <input type="number" id="salario" name="salario" required>
            
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>