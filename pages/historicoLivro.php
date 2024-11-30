<?php

include 'funcoes/historicoLivroFactory.php';

$cdLogado = $_SESSION['cd_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico Livros</title>
    <link rel="stylesheet" href="../css/historicoLivros.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <a href="perfil.php"><button>Voltar</button></a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    
        <div class="introHistorico">
            <p>aqui esta sua prateleira de livros, cada sessao com os livros de acordo com o status que vc impos anteriormente, mas caso queira voce pode atualizar seus status de leitura a qualquer momento!!</p>
            <p>seus status ficaram aparente nas salas dos livros que voce faz parte, para que voce possa saber como esta o seu e os status de leitura dos outros usuarios</p>
        </div>

        <section class="indicacoes">
        <h2>livros com status Visualizado</h2>

        <div class="livros-recomenda">

                <?php while ($livrosVisu = $resVisu->fetch_assoc()): ?>

                    <div class="img-livro">
                    <?php
                        $cdLivro = $livrosVisu['cd_livro'];
                        $sqlStatus = "SELECT * from tb_usuario_livros where cd_usuario = '$cdLogado' AND cd_livro = '$cdLivro'";
                        $resStatus = $con->query($sqlStatus);
                        $statusLivro = $resStatus->fetch_assoc();
                    ?>

                    <div class="statusLivro">
                    <form action="funcoes/statuslivro.php" method="POST">
                        <input type="hidden" name="cd_livro" value="<?php echo $livrosVisu['cd_livro']; ?>">
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="aguardando" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'aguardando' ? 'selected' : ''; ?>>Aguardando</option>
                            <option value="lido" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lido' ? 'selected' : ''; ?>>Lido</option>
                            <option value="lendo" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lendo' ? 'selected' : ''; ?>>Lendo</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>

                    </div>

                        <img src="<?php echo htmlspecialchars($livrosVisu['caminho_capa']); ?>">

                        <div class="func-livro">
                        <a href="funcoes/registrarUsuarioLivro.php?acao=baixar&cd_livro=<?php echo $livrosVisu['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" download >
                            Baixar PDF
                        </a>
                        <a href="funcoes/registrarUsuarioLivro.php?acao=ler&cd_livro=<?php echo $livrosVisu['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" target="_blank">
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
        <section class="indicacoes">
        <h2>livros com status Aguardando</h2>

        <div class="livros-recomenda">

                <?php while ($livrosAguard = $resAguard->fetch_assoc()): ?>

                    <div class="img-livro">
                    <?php
                        $cdLivro = $livrosAguard['cd_livro'];
                        $sqlStatus = "SELECT * from tb_usuario_livros where cd_usuario = '$cdLogado' AND cd_livro = '$cdLivro'";
                        $resStatus = $con->query($sqlStatus);
                        $statusLivro = $resStatus->fetch_assoc();
                    ?>

                    <div class="statusLivro">
                    <form action="funcoes/statuslivro.php" method="POST">
                        <input type="hidden" name="cd_livro" value="<?php echo $livrosAguard['cd_livro']; ?>">
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="aguardando" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'aguardando' ? 'selected' : ''; ?>>Aguardando</option>
                            <option value="lido" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lido' ? 'selected' : ''; ?>>Lido</option>
                            <option value="lendo" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lendo' ? 'selected' : ''; ?>>Lendo</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>

                    </div>

                        <img src="<?php echo htmlspecialchars($livrosAguard['caminho_capa']); ?>">

                        <div class="func-livro">
                        <a href="funcoes/registrarUsuarioLivro.php?acao=baixar&cd_livro=<?php echo $livrosAguard['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" download >
                            Baixar PDF
                        </a>
                        <a href="funcoes/registrarUsuarioLivro.php?acao=ler&cd_livro=<?php echo $livrosAguard['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" target="_blank">
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
        <section class="indicacoes">
        <h2>livros com status Lendo</h2>

        <div class="livros-recomenda">

                <?php while ($livrosLend = $resLend->fetch_assoc()): ?>

                    <div class="img-livro">
                    <?php
                        $cdLivro = $livrosLend['cd_livro'];
                        $sqlStatus = "SELECT * from tb_usuario_livros where cd_usuario = '$cdLogado' AND cd_livro = '$cdLivro'";
                        $resStatus = $con->query($sqlStatus);
                        $statusLivro = $resStatus->fetch_assoc();
                    ?>

                    <div class="statusLivro">
                    <form action="funcoes/statuslivro.php" method="POST">
                        <input type="hidden" name="cd_livro" value="<?php echo $livrosLend['cd_livro']; ?>">
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="aguardando" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'aguardando' ? 'selected' : ''; ?>>Aguardando</option>
                            <option value="lido" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lido' ? 'selected' : ''; ?>>Lido</option>
                            <option value="lendo" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lendo' ? 'selected' : ''; ?>>Lendo</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>

                    </div>

                        <img src="<?php echo htmlspecialchars($livrosLend['caminho_capa']); ?>">

                        <div class="func-livro">
                        <a href="funcoes/registrarUsuarioLivro.php?acao=baixar&cd_livro=<?php echo $livrosLend['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" download >
                            Baixar PDF
                        </a>
                        <a href="funcoes/registrarUsuarioLivro.php?acao=ler&cd_livro=<?php echo $livrosLend['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" target="_blank">
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
        <section class="indicacoes">
        <h2>livros com status Lido</h2>

        <div class="livros-recomenda">

                <?php while ($livrosLido = $resLido->fetch_assoc()): ?>

                    <div class="img-livro">
                    <?php
                        $cdLivro = $livrosLido['cd_livro'];
                        $sqlStatus = "SELECT * from tb_usuario_livros where cd_usuario = '$cdLogado' AND cd_livro = '$cdLivro'";
                        $resStatus = $con->query($sqlStatus);
                        $statusLivro = $resStatus->fetch_assoc();
                    ?>

                    <div class="statusLivro">
                    <form action="funcoes/statuslivro.php" method="POST">
                        <input type="hidden" name="cd_livro" value="<?php echo $livrosLido['cd_livro']; ?>">
                        <select name="status" id="status" required>
                            <option value="">Status</option>
                            <option value="aguardando" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'aguardando' ? 'selected' : ''; ?>>Aguardando</option>
                            <option value="lido" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lido' ? 'selected' : ''; ?>>Lido</option>
                            <option value="lendo" <?= isset($statusLivro['status_livro']) && $statusLivro['status_livro'] === 'lendo' ? 'selected' : ''; ?>>Lendo</option>
                        </select>
                        <button type="submit">Atualizar</button>
                    </form>

                    </div>

                        <img src="<?php echo htmlspecialchars($livrosLido['caminho_capa']); ?>">

                        <div class="func-livro">
                        <a href="funcoes/registrarUsuarioLivro.php?acao=baixar&cd_livro=<?php echo $livrosLido['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" download >
                            Baixar PDF
                        </a>
                        <a href="funcoes/registrarUsuarioLivro.php?acao=ler&cd_livro=<?php echo $livroslido['cd_livro']; ?>&caminho=../<?php echo urlencode($livros['caminho_livro']); ?>" target="_blank">
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



   
</body>
</html> 