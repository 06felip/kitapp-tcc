<?php
session_start();
include 'funcoes/verificacao-login.php';
include 'funcoes/buscaInfoSala.php';




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Sala</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="stylesheet" href="../css/salasOpen.css">
</head>
<body>
    <nav class="nav-bar">
        <a href="salas.php" class="button">voltar</a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    <section class="salaChat">
         <div class="containersala">       
                <div class="onlineUser">
                    
                <div class="info-sala">
                    <div class="titulo-sala">
                        <h1 class="titulo">Título:</h1>
                        <h3 class="conteudo"><?php echo htmlspecialchars($buscaInfo['titulo_sala']); ?></h3>
                        <h1 class="subtitulo">Subtítulo:</h1>
                        <h3 class="conteudo"><?php echo htmlspecialchars($buscaInfo['subtitulo_sala']); ?></h3>
                    </div>
                    <a class="btn-sair-sala">Sair da Sala</a>
                </div>  
                        <!-- Modal de Confirmação -->
                        <div id="modal-confirmacao" class="modal">
                            <div class="modal-content">
                                <p>Tem certeza de que deseja sair desta sala?</p>
                                <button id="conf">Sim</button>
                                <button id="canc">Não</button>
                            </div>
                        </div>
                   
                  

                </div>

                <div class="chat">
                    <div class="chat__messages">

                        <!-- <div class="message--self">Hello, World!</div>

                        <div class="message--other">
                            <span class="message--sender">KITAPP CHAT</span>
                            Olá, Mundo!        
                        </div> -->

                    </div>

                        <div class="chat-form">
                            <form class="chat__form"    >
                                <input type="text" class="chat__input" placeholder="Digite uma mensagem" required />
                                <button type="submit" class="chat__button">
                                    <span class="material-symbols-outlined">send</span>
                                </button>
                            </form>
                        </div>
                        
                </div>

                <div class="salafunc">
                    

                        <div class="usuarios-container">
                        <h2>Usuários Participantes</h2>

                        <ul class="usuarios-lista">
                            <?php while ($usuario = $resultLista->fetch_assoc()): ?>
                                <li class="usuario-item">
                                    <div class="usuario-info">
                                   <strong>Usuário:</strong><br> 
                                   <p> <?php echo htmlspecialchars($usuario['log_usuario']); ?></p>
                                    <p>
                                        <span class="status-icon 
                                            <?php 
                                                echo isset($usuario['status_livro']) ? strtolower($usuario['status_livro']) : 'default'; 
                                            ?>"></span>
                                        <strong>Status:</strong><br> 
                                        <?php echo isset($usuario['status_livro']) ? $usuario['status_livro'] : 'sem interação com o livro'; ?>
                                    </p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
        </div>  
    </section>

    <section class="salaMural">
        
    </section>

    <script>
         document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modal-confirmacao");
        const confirmarSaida = document.getElementById("conf");
        const cancelarSaida = document.getElementById("canc");

    

        // Abrir o modal ao clicar no botão "Sair da Sala"
        document.querySelectorAll(".btn-sair-sala").forEach(button => {
            button.addEventListener("click", (e) => {
                modal.style.display = "flex";
            });
        });

        // Confirmar a saída da sala
        confirmarSaida.addEventListener("click", () => {
            
                window.location.href = `funcoes/sairSala.php`;
            
        });

        // Cancelar a saída
        cancelarSaida.addEventListener("click", () => {
            modal.style.display = "none";
        });
    });
    </script>

    <script src="../js/salasOpen.js"></script>

    
</body>
</html>