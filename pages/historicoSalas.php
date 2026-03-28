<?php

include 'funcoes/historicoSalasFactory.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico Salas</title>
    <link rel="stylesheet" href="../css/historicoSalas.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <a href="perfil.php" class="button">Voltar</a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    <section class="salasIntegradas">
        <div class="introHistorico">
            <p>aqui é uma aba que junta todas as salas que voçê teve interação anteriormente; voçê pode retornar a uma sala a qualquer momento desde que a sala não tenha atingido seu limite máximo de usuários.</p>
        </div>

        <div class="salasAtivas">

             <h1 class="h1Ativas">salas participantes</h1>

            <div class="container">
                <div class="carrosel">
                    <?php while ($sala = $resultAtivo->fetch_assoc()): ?>
                        <a data-id="<?php echo $sala['cd_sala']?>" onclick="confirmarEntrada(this)" class="carousel-item">
                            <div class="sala">
                                <div class="sala-content">
                                    <div class="header-sala">
                                        <div class="statusSala">
                                            <p>Seu status: <?php echo isset($sala['status_usuario']) ? htmlspecialchars($sala['status_usuario']) : '  '; ?></p>
                                        </div>
                                        <div class="contador-usuarios">
                                            <p>Usuários na sala: <?php echo $sala['total_usuarios']; ?>/10</p>
                                        </div>
                                        <div class="img-sala">
                                            <img src="<?php echo $sala['capa_sala']?>" alt="">
                                        </div>
                                        <div class="intro-sala">
                                            <h1><?php echo htmlspecialchars($sala['titulo_sala']); ?></h1>
                                            <h3><?php echo htmlspecialchars($sala['subtitulo_sala']); ?></h3>
                                        </div>
                                    </div>
                                    <p><?php echo htmlspecialchars($sala['desc_sala']); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>

                </div>
                <button class="anterior">&#10094;</button>
                <button class="proximo">&#10095;</button>
            </div>

        </div>

        <div class="salasSaidas">

             <h1 class="h1Ativas">salas que voçê não faz mais parte</h1>

             <div class="container">
                <div class="carrosel">
                    <?php while ($sala = $resultSaiu->fetch_assoc()): ?>
                        <a data-id="<?php echo $sala['cd_sala']?>" onclick="confirmarEntrada(this)" class="carousel-item">
                            <div class="sala">
                                <div class="sala-content">
                                    <div class="header-sala">
                                        <div class="statusSala">
                                            <p>Seu status: <?php echo isset($sala['status_usuario']) ? htmlspecialchars($sala['status_usuario']) : '  '; ?></p>
                                        </div>
                                        <div class="contador-usuarios">
                                            <p>Usuários na sala: <?php echo $sala['total_usuarios']; ?>/10</p>
                                        </div>
                                        <div class="img-sala">
                                            <img src="<?php echo $sala['capa_sala']?>" alt="">
                                        </div>
                                        <div class="intro-sala">
                                            <h1><?php echo htmlspecialchars($sala['titulo_sala']); ?></h1>
                                            <h3><?php echo htmlspecialchars($sala['subtitulo_sala']); ?></h3>
                                        </div>
                                    </div>
                                    <p><?php echo htmlspecialchars($sala['desc_sala']); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <button class="anterior">&#10094;</button>
                <button class="proximo">&#10095;</button>
            </div>
    </section>


    <script>
// Objeto para rastrear os índices de cada carrossel
const carouselIndices = new Map();

document.querySelectorAll('.salasAtivas, .salasSaidas').forEach((container) => {
    const carousel = container.querySelector('.carrosel');
    const items = carousel.querySelectorAll('.carousel-item');

    // Inicializa o índice para este carrossel
    carouselIndices.set(carousel, 0);

    // Botão anterior
    const prevButton = container.querySelector('.anterior');
    prevButton.addEventListener('click', () => {
        moveSlide(carousel, items, -1);
    });

    // Botão próximo
    const nextButton = container.querySelector('.proximo');
    nextButton.addEventListener('click', () => {
        moveSlide(carousel, items, 1);
    });
});

function moveSlide(carousel, items, direction) {
    const totalItems = items.length;
    let currentIndex = carouselIndices.get(carousel);

    // Calcula o novo índice
    currentIndex = (currentIndex + direction + totalItems) % totalItems;

    // Atualiza o índice no mapa
    carouselIndices.set(carousel, currentIndex);

    // Ajusta o deslocamento do carrossel
    const offset = -(currentIndex * (310 + 25)); // 310px é o tamanho do card, 25px é o gap
    carousel.style.transform = `translateX(${offset}px)`;

    // Adiciona transição suave
    carousel.style.transition = 'transform 0.5s ease';
}</script>
</body>
</html> 