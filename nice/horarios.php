<?php
session_start();
include_once("config.php");

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Verifica se a conexão foi estabelecida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}

$email = $_SESSION['email']; // Pega o email da sessão
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Horários de Funcionamento</title>
    <style>
        
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 45px;
            padding-left: 8%;
            padding-right: 8%;
        }

        .hours-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #ede4e4;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #d1ab00;
            color: white;
        }

        tr:last-child td {
            border-bottom: none;
        }

        td:not(:first-child) {
            color: #666;
        }

        @media (max-width: 600px) {
            th, td {
                padding: 10px;
                font-size: 14px;
            }
        }
        
        .booking-form {
            margin-top: 30px;
            text-align: center;
        }
        
        .booking-form input, .booking-form select {
            padding: 10px;
            margin: 10px;
            width: calc(100% - 40px);
        }

        .booking-form button {
            padding: 10px 20px;
            background-color: #d1ab00;
            color: white;
            border: none;
            cursor: pointer;
        }

        .booking-form button:hover {
            background-color: #00b2d1;
        }
    </style>
</head>
<body>
    <nav>
        <h2 class="logo">Nice<span>Hair</span></h2>
        <ul class="cabeçalho-link">
        <li><a href="inxex.php">Início</a></li>
            <li><a href="serviços.php">Serviços</a></li>
            <li><a href="horarios.php">Horarios</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        <?php 
            if (empty($_SESSION['email'])) {
                echo "<a href ='login.php' class='btn'>Logar</a>";
            } else {
                echo "<a href='logout.php' class='btn btn-danger me-5'>logout</a>";
            }
        ?>
    </nav>
                <!-- Tabela de horários -->

    <div class="hours-container">
        <h1>Horários de Funcionamento</h1>
        <table>
            <thead>
                <tr>
                    <th>Dia da Semana</th>
                    <th>Horário</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Segunda-feira</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Terça-feira</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Quarta-feira</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Quinta-feira</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Sexta-feira</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Sábado</td>
                    <td>18:00 - 22:00</td>
                </tr>
                <tr>
                    <td>Domingo</td>
                    <td>Fechado</td>
                </tr>
            </tbody>
        </table>
    </div>
            </tbody>
        </table>
    </div>

    <div class="booking-form">
        <h2>Agendar um Horário</h2>
        <form action="agendamento.php" method="post">
            <select name="dia" required>
                <option value="" disabled selected>Selecione o Dia</option>
                <option value="Segunda-feira">Segunda-feira</option>
                <option value="Terça-feira">Terça-feira</option>
                <option value="Quarta-feira">Quarta-feira</option>
                <option value="Quinta-feira">Quinta-feira</option>
                <option value="Sexta-feira">Sexta-feira</option>
                <option value="Sábado">Sábado</option>
            </select>
            <input type="time" name="horario" required>
            <input type="text" name="email" placeholder="Seu email" value="<?php echo $email; ?>" required readonly>
            <button name="submit" type="submit">Agendar</button>
        </form>
    </div>
</body>
</html>
