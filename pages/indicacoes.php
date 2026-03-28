<?php 
session_start();
include 'funcoes/verificacao-login.php';
include 'funcoes/indicacao.factory.php';
include 'funcoes/livros.factory.php';



$pesquisaLivro = isset($_GET['pesquisaLivro']) ? $_GET['pesquisaLivro'] : '';

if($pesquisaLivro){

$sqlPesquisa = "SELECT autor_livro , titulo_livro
        FROM tb_livros
        WHERE titulo_livro LIKE '%$pesquisaLivro%' 
        OR autor_livro LIKE '%$pesquisaLivro%' ";
        
$resLivro = $con->query($sqlPesquisa);

if($resLivro-> num_rows === 0){
    header("location:indicacoes.php");
}
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área KTP</title>
    <link rel="stylesheet" href="../css/indicacoes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <div class="logo">
           <a href="./home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>

        <!-- <div> 
            <form action="" method="GET"  class="busca">
                <input type="text" placeholder="Busque por títulos de livro, editor(a) ou salas criadas..." name="pesquisa"  >
                <button class="pesquisar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>  -->


        <div class="func">
         
            <li>
                <ul><a href="home.php">Home</a></ul>
                <ul><a href="salas.php">Salas</a></ul>
                <ul><a href="indicacoes.php">Área KTP</a></ul>
                <ul><a href="perfil.php">Perfil</a></ul>
            </li>
        </div>
        
    </nav>

    <section class="livrarias-sebos">
        <h1 id="h1-section-parcerias">Livrarias e Sebos</h1>

        <div class="indica-header">
            <h1>Sebos e livrarias</h1>
            <h1>Loja</h1>
            <h1>Estado</h1>
            <h1>Cidade</h1>
            <h1>Endereço</h1>
        </div>

            <div class="indica">

                    <?php while($indicacao = $res->fetch_assoc()): ?>

                        <div class="card-indicacoes">
                            <div class="parte-sup">
                                <div class="desc-card">

                                    <div class="campo-indica">
                                        <p><?php echo htmlspecialchars($indicacao['nm_indicacao']); ?></p>
                                    </div>

                                    <div class="campo-indica">
                                        <p><?php echo htmlspecialchars($indicacao['tipo_indicacao']); ?></p>
                                    </div>

                                    <div class="campo-indica">
                                        <p><?php echo htmlspecialchars($indicacao['uf_indicacao']); ?></p>
                                    </div>

                                    <div class="campo-indica">
                                        <p><?php echo htmlspecialchars($indicacao['cidade_indicacao']); ?></p>
                                    </div>

                                    <div class="campo-indica">
                                        <p><?php echo htmlspecialchars($indicacao['end_indicacao']); ?></p>
                                    </div>

                                    
                                </div>
                        </div>

                                <div class="parte-infe">
                                    <a href="">ver catálogo</a>
                                </div>
                            </div>
                    <?php endwhile;?>

            </div>
        
    </section>


    <section class="leitura">
        <h1 id="h1-section-leitura">Livros em Alta</h1>

        <div> 
            <form action="" method="GET"  class="busca">
                <input type="text" placeholder="Busque por títulos de livro ou editor(a)..." name="pesquisaLivro"  >
                <button class="pesquisar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div> 

        <div class="livros-recomenda">
            <div class="carrosel">
                <?php while ($livros = $livrosIndica->fetch_assoc()): ?>
                    <div class="carousel-item"></div>
                    <div class="img-livro" class="carousel-item">

                        <!-- php para facilitar busca dos status -->
                        <?php
                            $cdLogado = $_SESSION['cd_usuario'];
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

                            <div class="imgContainer">
                                <img src="<?php echo htmlspecialchars($livros['caminho_capa']); ?>" alt="">
                            </div>

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
            <button class="anterior" id="buttonLivro" >&#10094;</button>
            <button class="proximo" id="buttonLivro">&#10095;</button>

        </div>


    </section>


   
    

    <script src="../js/carrosel.js"></script>
</body>
</html>