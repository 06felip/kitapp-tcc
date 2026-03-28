
<?php 
session_start();    
include 'funcoes/verificacao-login.php';

$user = $_SESSION['login_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body>  
    <nav class="nav-bar">
        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>

     
     
       <!-- <div class="busca">
            <input type="text" placeholder="Busque por titulos de livro, editora ou salas criadas...">
        </div> -->

        <div class="func">
         
            <li>
                <ul><a href="home.php">Home</a></ul>
                <ul><a href="salas.php">Salas</a></ul>
                <ul><a href="indicacoes.php">Área KTP</a></ul>
                <ul><a href="perfil.php">Perfil</a></ul>
          </li>
        </div>
        
    </nav>


    <main class="perfil-user">

        <!-- <div class="foto-perfil">
            <img src="../images/user-regular.svg" >
           <button>editar</button>
        </div>
        <h1><?php echo "$user"; ?></h1> -->


        <div class="func-perfil">
            <ul>
                <li><a href="infoUSer.php">Editar dados do usuário</a></li>
                <li><a href="historicoLivro.php">Biblioteca de livros</a></li>
                <li><a href="historicoSalas.php">Histórico de salas</a></li>
                
            </ul>

            <a href="funcoes/deslogar.php" ><button id="logout">Log out</button></a>
        </div>

    </main>
    
    
    <script src="../js/perfil.js"></script>

</body>
</html>