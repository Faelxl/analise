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
            display: flex;
            justify-content: center;
            align-items: center;
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
        .mensage{
            color: white;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cadastro de serviços</h2>
        <form action="cadastro_serviços.php" method="post"  enctype="multipart/form-data">
            <label for="imagem">imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="/img" required>
            
            <label for="nome_produto">Nome do serviço:</label>
            <input type="text" id="nome_produto" name="nome_produto" required>
            
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
            <?php
include_once('config.php');
if (isset($_POST['submit'])) {
    function uploadImagem($imagem) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($imagem["name"]);

        if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }

    $imagem = $_FILES["imagem"];
    $nome = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];
    
    $imagem_path = null;
    if (isset($imagem) && $imagem["error"] === 0) {
        $imagem_path = uploadImagem($imagem);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    if ($imagem_path) {
        $stmt = $conexao->prepare("INSERT INTO `servico` (imagem, nome_servico, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $imagem_path, $nome, $descricao);

        // Executando a query
        if ($stmt->execute()) {
            echo "Serviço cadastrado com sucesso";
        } else {
            echo "Erro ao inserir serviço: " . $stmt->error;
        }

        $stmt->close();
    }

    $conexao->close();
}
?>
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
