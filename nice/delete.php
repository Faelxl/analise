<?php
include_once('config.php');

// Verificar se o ID foi fornecido
if (!empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);

    // Preparar a consulta SELECT para verificar se o cliente existe
    $sqlSelect = "SELECT * FROM `usuários` WHERE id=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("i", $id); // Usar "i" para parâmetro inteiro

    // Executar a consulta SELECT
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Começar a transação para garantir integridade dos dados
            $conexao->begin_transaction();

            try {
                // Excluir os agendamentos do usuário
                $sqlDeleteAgendamentos = "DELETE FROM `agendamentos` WHERE fk_id_usuario=?";
                $stmtDeleteAgendamentos = $conexao->prepare($sqlDeleteAgendamentos);
                $stmtDeleteAgendamentos->bind_param("i", $id);
                $stmtDeleteAgendamentos->execute();
                $stmtDeleteAgendamentos->close();

                // Excluir o usuário da tabela `usuários`
                $sqlDeleteUsuario = "DELETE FROM `usuários` WHERE id=?";
                $stmtDeleteUsuario = $conexao->prepare($sqlDeleteUsuario);
                $stmtDeleteUsuario->bind_param("i", $id);
                $stmtDeleteUsuario->execute();
                $stmtDeleteUsuario->close();

                // Commit da transação
                $conexao->commit();

                echo "Cliente e todos os dados relacionados foram deletados com sucesso!";
            } catch (Exception $e) {
                // Caso ocorra algum erro, faz rollback da transação
                $conexao->rollback();
                echo "Erro ao deletar cliente e dados relacionados: " . $e->getMessage();
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Fechar a declaração SELECT
    $stmtSelect->close();
}

// Redirecionar após o processamento e garantir que o script seja encerrado
header('Location: listacliente.php');
exit; // Interrompe a execução do script após o redirecionamento
?>
