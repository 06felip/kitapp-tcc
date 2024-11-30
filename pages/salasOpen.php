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
        <a href="salas.php"><button>voltar</button></a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    <section class="salaChat">
         <div class="containersala">       
                <div class="onlineUser">
                    
                    
                    <div class="usuarios-container">
                        <h2>Usuários participantes</h2>

                        <ul class="usuarios-lista">
                            <?php while ($usuario = $resultLista->fetch_assoc()): ?>
                                <li class="usuario-item">
                                    <div class="usuario-info">
                                        <p><strong>Usuário:</strong> <?php echo htmlspecialchars($usuario['log_usuario']); ?></p>
                                        <p><strong>status:</strong> <?php echo isset($usuario['status_livro'])? $usuario['status_livro'] : 'ainda não há interação com o livro'; ?></p>
                                        
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
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
                    <div class="tituloSala">
                        <h1>Título:</h1>
                        <h3><?php echo $buscaInfo['titulo_sala']; ?></h3><br>
                        <h1>Subtítulo:</h1>
                        <h3><?php echo $buscaInfo['subtitulo_sala']; ?></h3>
                    </div>

                        <button class="btn-sair-sala" >Sair da Sala</button>
                        
                        <!-- Modal de Confirmação -->
                        <div id="modal-confirmacao" class="modal">
                            <div class="modal-content">
                                <p>Tem certeza de que deseja sair desta sala?</p>
                                <button id="confirmar-saida">Sim</button>
                                <button id="cancelar-saida">Não</button>
                            </div>
                        </div>
                </div>
        </div>  
    </section>

    <section class="salaMural">
        
    </section>

    <script>
         document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modal-confirmacao");
        const confirmarSaida = document.getElementById("confirmar-saida");
        const cancelarSaida = document.getElementById("cancelar-saida");

    

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