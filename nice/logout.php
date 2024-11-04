<?php
    session_start();

    // Remove todas as variáveis da sessão
    session_unset();

    // Destrói a sessão no servidor
    session_destroy();

    // Remove o cookie de sessão (opcional, mas recomendado)
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Redireciona para a página de login
    header("Location: inxex.php");
    exit();
?>