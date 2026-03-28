<?php 
session_start();
include 'funcoes/verificacao-login.php';
include 'funcoes/salas.factory.php';

//uma curta logica para a pesquisa(sem tempo para aumentar o filtro)

$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

if($pesquisa){

$sql = "SELECT 
        tb_salas.*, 
        tb_usuario_salas.status_user AS status_usuario, 
        (SELECT COUNT(*) FROM tb_usuario_salas WHERE tb_usuario_salas.cd_sala = tb_salas.cd_sala) AS total_usuarios
        FROM 
        tb_salas
        LEFT JOIN 
        tb_usuario_salas 
        ON tb_salas.cd_sala = tb_usuario_salas.cd_sala 
        WHERE titulo_sala LIKE '%$pesquisa%' 
        OR subtitulo_sala LIKE '%$pesquisa%' 
        OR desc_sala LIKE '%$pesquisa%'";


$res = $con->query($sql);

if($res-> num_rows === 0){
    header("location:salas.php");
}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
    <link rel="stylesheet" href="../css/salas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>


        <div> 
            <form action="salas.php" method="GET"  class="busca">
                <input type="text" placeholder="Busque por títulos de livro, editor(a) ou salas criadas..."
                value="<?php echo htmlspecialchars($pesquisa); ?>" name="pesquisa"  >
                <button class="pesquisar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
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


    
     
    <div class="container">
        <div class="caixas">
            <?php while ($sala = $res->fetch_assoc()): ?>

                <div class="sala">
                    <a data-id="<?php echo $sala['cd_sala']?>" onclick="confirmarEntrada(this)">
                    
                            <div class="sala-content">
                                <div class="header-sala">
                                    <div class="statusSala">
                                    <p>Seu status: <?php echo isset($sala['status_usuario']) ? htmlspecialchars($sala['status_usuario']) : '  '; ?></p>
                                    </div>
                                    
                                    <div class="img-sala">
                                        <img src="<?php echo isset($sala['capa_sala']) ? $sala['capa_sala'] : '' ?>" alt="">
                                    </div>

                                    <div class="intro-sala">

                                        <h1><?php echo htmlspecialchars($sala['titulo_sala']); ?></h1>
                                        <h3><?php echo htmlspecialchars($sala['subtitulo_sala']); ?></h3>
                                        
                                    </div>

                                    
                                </div> 
                                
                                <p><?php echo htmlspecialchars($sala['desc_sala']); ?></p>

                                <div class="contador-usuarios">
                                        <p>Usuários na sala: <?php echo isset( $sala['total_usuarios'])? $sala['total_usuarios'] : '0' ; ?>/10</p>
                                </div>
                                
                                
                            </div>

                    </a>
                            
                </div>
            <?php endwhile; ?>
        </div>

    </div>

    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <p>deseja entrar sala?</p>
            <button onclick="entrarSala()" id="conf">Confirmar</button>
            <button onclick="fecharModal()" id="canc">Cancelar</button>
        </div>
    </div>


    <script src="../js/confirmaID.js"></script>
</body>
</html>