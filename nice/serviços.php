<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Nossos Serviços</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-image: url('./img/Captura\ de\ tela\ 2024-08-05\ 145526.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            height: 100vh; 
            align-items: center;
            padding: 20px;
        }
        nav{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .services-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #e8e3e3;
            margin-bottom: 20px;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .service-item {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .service-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .service-item h3 {
            margin: 15px 0 10px;
            color: #333;
        }
        .service-item p {
            padding: 0 15px 15px;
            color: #666;
        }
        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
    </style>
</head>
<body>
    <nav>
        
    <h2 class="logo">Nice<span>Hair</span></h2><!--Logo-->
    <ul class="cabeçalho-link">
        <li><a href="inxex.html">Inicio</a></li>
        <li><a href="serviços.html">Serviços</a></li>
        <li><a href="horarios.html">Horarios</a></li>
        <li><a href="contato.html">Contato</a></li>
    </ul><!--cabeçalho-link-->
    <a href ="login.php" class="btn">Logar</a>

</nav>

            <div class="services-container">
        <h1>Nossos Serviços</h1>
        <div class="services-grid">
            <div class="service-item">
                <img src="c:\Users\mateu.DESKTOP-C6TVACC\OneDrive\Imagens\xbigwesx-how-to-shape-a-beard--e1544729078585.jpg" alt="Serviço 1">
                <h3>Corte de Cabelo Premium</h3>
                <p>Experimente o luxo de um corte de cabelo premium com cuidados especiais, uma experiência única que combina estilo e tratamento personalizado</p>
            </div>
            <div class="service-item">
                <img src="c:\Users\mateu.DESKTOP-C6TVACC\OneDrive\Imagens\mrkoachman_beardpost-71.webp" alt="Serviço 2">
                <h3>Tratamento de Barba e Hidratação </h3>
                <p>Ideal para quem deseja um cuidado profundo, este serviço inclui um tratamento de esfoliação da pele sob a barba para remover células mortas, seguido de uma hidratação intensiva com óleos e bálsamos específicos.</p>
            </div>
            <div class="service-item">
                <img src="c:\Users\mateu.DESKTOP-C6TVACC\OneDrive\Imagens\da250352b74939d394d84a56bbada4f2.jpg" alt="Serviço 3">
                <h3>Design de Sobrancelhas</h3>
                <p>Transforme o seu olhar com o nosso serviço de design de sobrancelhas masculinas, uma experiência de cuidado e precisão que destaca sua expressão de forma sofisticada e natural. </p>
            </div>
    
        </div>
    </div>

</body>
</html>
