<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    $sql = "SELECT * FROM `usuários` where id=?";
    $sqlUpdate = "UPDATE usuários SET nome=?, email=?, senha=?, tipo=? WHERE id=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssss", $nome, $email, $senha, $tipo, $id);



    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    // Fecha o statement
    $stmt->close();
}
// Redireciona para a lista de clientes
header('Location: listacliente.php');
?>