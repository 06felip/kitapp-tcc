<?php
session_start();
//primeiras tentativas so pra lembrete

    //estava com problemas e fiz esse teste para ver se a session estava recebendo os valores corretamente :) 
    // echo "<pre>";
    // print_r($_SESSION); // Isso mostrará todas as variáveis de sessão
    // echo "</pre>";
        
    // if( isset ($_SESSION['login_email']) &&  isset($_SESSION['senha'])) 
    // {
        
        
    // }
    // else
    // {

    //     unset($_SESSION['login_email']);
    //     unset($_SESSION['senha']);


    //     header("Location:index.php");
        
    // }
//---------------------------------------------

    include 'funcoes/verificacao-login.php';
    include 'funcoes/salas.factory.php';
    include 'funcoes/livros.factory.php';

 



    $user = $_SESSION['login_email'];
    $cdLogado = $_SESSION['cd_usuario'];
    


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>

     
     
      

        <div class="func">
         
            <li>
                <ul><a href="home.php">Home</a></ul>
                <ul><a href="salas.php">Salas</a></ul>
                <ul><a href="indicacoes.php">Área KTP</a></ul>
                <ul><a href="perfil.php">Perfil</a></ul>
            </li>
        </div>
        
    </nav>


        <div class="intro">
            <h2>Olá <?php echo $user?>! Aqui será seu lugar favorito na hora da leitura, vamos explorar?</h2>

            <p>
                Aqui você vai achar um ambiente de leitura mais facilmente,
                poderá ver nossas indicações e muito mais!!
            </p>
        </div>

    <section class="sala-home">
        <h2 id="">Salas</h2>
        <div class="container-salas">
            <div class="caixas">

            <?php while ($sala = $resHome->fetch_assoc()): ?>

                <a data-id="<?php echo $sala['cd_sala']?>" onclick="confirmarEntrada(this)">
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

            <div class="maisSalas">
                <a href="salas.php">
                    <div class="contentmais">
                        <h1>+</h1>
                        <small>mais opçoes</small>
                    </div>
                </a>
            </div>
                
                
            
            </div>
        </div>

        <div id="confirmModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <p>deseja entrar sala?</p>
            <button onclick="entrarSala()">Confirmar</button>
            <button onclick="fecharModal()">Cancelar</button>
        </div>
    </div>
    </section>

    <section class="indicacoes">
        <h2>Indicações</h2>

        <div class="livros-recomenda">

                <?php while ($livros = $livrosHome->fetch_assoc()): ?>

                    <div class="img-livro">
                    <?php
                        $cdLivro = $livros['cd_livro'];
                        $sqlStatus = "SELECT * from tb_usuario_livros where cd_usuario = '$cdLogado' AND cd_livro = '$cdLivro'";
                        $resStatus = $con->query($sqlStatus);
                        $statusLivro = $resStatus->fetch_assoc();
                    ?>

                    <div class="statusLivro">
                    <form action="funcoes/statuslivro.php" method="POST">
                        <input type="hidden" name="cd_livro" value="<?php echo $livros['cd_livro']; ?>">
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="aguardando" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'aguardando' ? 'selected' : ''; ?>>Aguardando</option>
                            <option value="lido" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lido' ? 'selected' : ''; ?>>Lido</option>
                            <option value="lendo" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lendo' ? 'selected' : ''; ?>>Lendo</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>

                    </div>

                        <img src="<?php echo htmlspecialchars($livros['caminho_capa']); ?>" alt="">

                        <div class="func-livro">
                        <a href="funcoes/registrarUsuarioLivro.php?acao=baixar&cd_livro=<?php echo $livros['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" download >
                            Baixar PDF
                        </a>
                        <a href="funcoes/registrarUsuarioLivro.php?acao=ler&cd_livro=<?php echo $livros['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" target="_blank">
                            Ler Online
                        </a>
                        </div>

                        <div class="resStatus">
                            <label for="">Status:</label>
                            <p> <?php echo isset( $statusLivro['status_livro']) ? $statusLivro['status_livro'] :  ' '; ?></p>
                        </div>

                    </div>

                <?php endwhile; ?>
                
            
           

        </div>

    </section>


   
    

    <script src="../js/confirmaID.js"></script>
</body>
</html>