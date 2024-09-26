<?php
include_once('config.php');

// Verifica se o parâmetro 'email' foi enviado via GET
if (isset($_GET['id'])) {
    // Sanitiza o email para evitar injeção de SQL
    $id = mysqli_real_escape_string($conexao, $_GET['id']);

    // Prepara a consulta SQL utilizando prepared statements
    $sql = "SELECT * FROM usuários WHERE id=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $id);

    // Executa a consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $user_data = $result->fetch_assoc();

            // Atribui os valores aos campos do formulário
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $tipo = $user_data['tipo'];
            
            // ... outros campos ...
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
        exit;
    }

    // Fecha o statement
    $stmt->close();
    }
 else {
    header('Location: listacliente.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
</head>
<body>
    <header>
      
    <h1>Cadastro de Cliente</h1>
    <body>
    <a href="listacliente.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
       
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha" required>

        <label for="tipo">tipo:</label>
        <select id="tipo" name="tipo" required>
            <option name="tipo" value="" disabled selected>Selecione o tipo</option>
            <option name="tipo" value="0">0</option>
            <option name="tipo" value="1">1</option>
           
        </select>

        <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>

</html>