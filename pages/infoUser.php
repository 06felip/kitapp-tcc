<?php
session_start();

    include 'funcoes/verificacao-login.php';

    include 'funcoes/buscarInfo.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuário</title>
    <link rel="stylesheet" href="../css/infoUser.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav-bar">
        <a href="perfil.php"><button>Voltar</button></a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    <section class="section-user">
        
            <h1>INFORMAÇÕES DO USUÁRIO</h1>
        <div class="container-info">

                <div class="info-user">

                    <div class="foto-container">
                        <div class="foto-info">        
                                <div class="fotoUser">
                                    <img src="../images/user-regular.svg" >
                                </div>
                                <button>Alterar Foto de Perfil</button>
                        </div> 
                                <p>Personalize sua conta com uma foto. Sua foto de perfil aparecerá para outros usuários dentro das salas.</p>
                        
                    </div>

                        
                            <div class="informacoes">
                                <form action="funcoes/editar.php" method="POST" >
                                        <!-- Informações Pessoais -->
                                    
                                        <h3>Informações Pessoais</h3>

                                        <label>Nome Completo:</label>
                                        <input type="text" name="nome_completo" value="<?php echo isset($nome) ? $nome : ''; ?>"  class="inputs">

                                        <label>Data de Nascimento:</label>
                                        <input type="date" name="data_nascimento"  value="<?php echo isset($data) ? $data : ''; ?>"  class="inputs">

                                        <label>Email:</label>
                                        <input type="email" name="email"  value="<?php echo isset($email) ? $email : ''; ?>"  class="inputs">

                                        <label>Telefone:</label>
                                        <input type="tel" name="telefone"  value="<?php echo isset($tel) ? $tel : ''; ?>"  class="inputs">
                                        
                                        <label>Login:</label>
                                        <input type="text" name="login"  value="<?php echo isset($login) ? $login : ''; ?>"  class="inputs">

                                        <input type="submit" value="atualizar informações" class="inputSubmit" >

                                </form>

                                <form action="funcoes/editarSenha.php" method="POST">
                                        <h3>Alterar Senha</h3>

                                        <label>Senha Atual:</label>
                                        <input type="password" name="senhaAtual"   class="inputs"  required>

                                        <label>Nova Senha:</label>
                                        <input type="password" name="senhaNova"   class="inputs"  required>

                                        <label>Confirmar Senha:</label>
                                        <input type="password" name="confirmSenha"   class="inputs"  required>

                                        <input type="submit" value="Alterar Senha" class="inputSubmit" >
                                </form>
                                       
                                                       
                            </div>

    
                </div>
        </div>
    </section>      
</body>
</html> 