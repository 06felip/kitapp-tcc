<?php
session_start();

$erroLogin = isset($_SESSION['erroLogin']) ? $_SESSION['erroLogin'] : '';
$erroEmail = isset($_SESSION['erroEmail']) ? $_SESSION['erroEmail'] : '';
$erroSenha = isset($_SESSION['erroSenha']) ? $_SESSION['erroSenha'] : '';

unset($_SESSION['erroLogin'], $_SESSION['erroEmail'], $_SESSION['erroSenha']);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça Seu Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>     
<body>
    <nav class="nav-bar">
        <div class="logo">
           <a href="#"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>

     
     

        <div class="func">
         
           <!-- <ul>
                <li><a href="login.php">login</a></li>
                <li><a href="cadastro.php">cadastro</a></li>
            </ul>-->   

           <h1><a href="" id="openModalBtn">Vamos juntos!</a></h1>
        </div>
        
    </nav>



  <section class="intro">

     <h1> UM NOVO AMBIENTE PARA LER E SE AVENTURAR!</h1>


      <div class="pitch">

            <video width="600px" height="420px" controls >
                <source src="../images/kitapp.mp4" type="video/mp4">
            </video>

            <div class="content-pitch">
                <h3> Junte-se à Comunidade de Leitores Apaixonados! </h3>
                <p>
                    Descubra um novo mundo de livros, troque ideias com outros leitores e explore novas aventuras literárias!
                <p>
                <p>
                    entre em salas dos seus livros favoritos e se divirta conversando com amantes da obra igual a <span>VOCÊ!</span>
                </p>
                
                    <p>
                    Vamos ler juntos? Acesse agora e comece a compartilhar suas paixões literárias!    
                </p>

                <a href="" id="openModalBtnLink" >vamos comecar?!</a>
               

            </div>
      </div>

  </section>

  <section class="sobre-nos">
    <h2>Olá, leitor! Seja bem-vindo ao KITAPP!</h2>

    <!-- <p> Olá leitor! agora vamos falar um pouco do porque iniciamos esse projeto. <br>
        Nós da KITAPP após um longo período de pesquisas vimos um declínio enorme na prática da leitura ao redor do mundo e todos nós sabemos desde a época de escola que a prática da leitura nos dá muitos benefícios dando para a área pessoal como profissional. 
        <br> E com isso resolvemos iniciar um projeto que transforme o "momento de ler" mais coletivo, agradável e divertido, com salas que são como comunidades de leitura onde você leitor poderá interagir com os outros que lá estão, todos ao mesmo tempo e sobre o mesmo livro! Interessante não é? Então vamos lá!!
    </p>
     -->

   <p>
   Você já imaginou um espaço onde o "momento de ler" se torna mais coletivo, inspirador e, acima de tudo, divertido? Depois de muita pesquisa, percebemos o quanto a prática da leitura vem declinando ao redor do mundo. Sabemos que ler traz inúmeros benefícios, tanto para a vida pessoal quanto para o desenvolvimento profissional. Foi assim que nasceu o KITAPP: uma plataforma que transforma a leitura em uma experiência compartilhada!
   </p>

   <p>Aqui, você terá acesso a salas dedicadas a cada livro, onde poderá discutir em tempo real, trocar opiniões e se inspirar com outros leitores que compartilham o mesmo interesse. É como fazer parte de uma comunidade de leitura, interagindo e mergulhando nas histórias junto com outros apaixonados por livros.</p>
    
   <p>Preparado para descobrir uma nova forma de ler? Então, vamos lá!</p>
</section>






    <!-- campo para login e cadastro -->
     
    <!-- primeiro modal para cadastro -->

  <div id="fade" class="fade"></div>

    <div class="modal-cadastro">
        <div class="modal-content"> 

            <div class="cadastro-modal">  
                    <div class="header-cadastro">
                        <h1><div id="cdst">Cadastro</div> <div id="ktp">KITAPP</div></h1>

                        <button id="closeModalBtn" class="close-cadastro">Voltar</button>
                    </div>
                    

                    <p>Olá leitor!Tudo bom?</p>
                    <p>vamos concluir seu cadastro para comecar essa nova aventura!!</p>
                    
                
                    <form action="funcoes\cadastrar.php" class="form-cadastro" method="POST" required>
                        <div>
                            <input type="text" placeholder="NOME COMPLETO" name="nome" required>
                        </div>

                        <div>
                            <input type="text" placeholder="LOGIN" name="login" required>
                            <P class="erro"><?php
                                if (!empty($erroLogin)) {
                                echo "$erroLogin";
                                }
                            ?></P>
                        </div>

                        <div>
                            <input type="email" placeholder="E-MAIL" name="email" required>
                            <P class="erro"><?php
                                if (!empty($erroEmail)) {
                                echo "$erroEmail";
                                }
                            ?></P>
                        </div>

                        <div>
                            <input type="password" placeholder="CRIE UMA SENHA" name="senha" required>
                        </div>

                        <div>
                            <input type="password" placeholder="CONFIRME A SENHA" name="confirmar-senha" required>
                            <P class="erro"><?php
                                if (!empty($erroSenha)) {
                                echo "$erroSenha";
                                }
                            ?></P>
                        </div>
                        <input type="submit" value="CADASTRAR" id="btnCadastrar">
                        

                        <a href="" id="openModalLogin">ja é um leitor parceiro?<div class="link">faça seu login!</div> </a>  
                    </form>
            </div>  
        </div>
    </div>

    <!-- segundo modal -->

   

    <div class="modalLogin">
        <div class="modal-content"> 

                <div class="login-modal">  
                     <div class="header-login">
                        <h1><div id="cdst">Login</div> <div id="ktp">KITAPP</div></h1>

                        <button id="closeModalBtnLogin" class="close-login">Voltar</button>
                    </div>
                       

                        <!-- <p>Olá leitor!Tudo bom?</p>
                        <p>vamos concluir seu cadastro para comecar essa nova aventura!!</p> -->
                        
                    
                        <form action="funcoes\logar.php" class="form-login" method="POST">
                            
                            <input type="text" placeholder="E-MAIL OU LOGIN" name="login_email" required>
                            <input type="password" placeholder="SENHA" name="senha" required>

                            <input type="submit" value="ENTRAR" id="btnLogar">
                           

                            <a href="" id="openModalCad">ainda não possui seu cadastro?<div class="link"> Vamos criar!!</div></a>  
                        </form>
                    </div>  
        </div>
    </div>

    <footer>
        <div class="footer">
            <h2>@copyright by KITAPP</h2>
        </div>
    </footer>
  
    
    <script>
         // Se houver erros, abre automaticamente o modal de cadastro
         window.onload = function() {
    // Verifica as mensagens de erro passadas pelo PHP
    const erroLogin = "<?php echo $erroLogin; ?>";
    const erroEmail = "<?php echo $erroEmail; ?>";
    const erroSenha = "<?php echo $erroSenha; ?>";

    // Obtém o elemento do modal e o fundo de fade
    const modalCadastro = document.querySelector('modal-cadastro'); // Certifique-se de que este seja o ID correto do modal
    const fade = document.querySelector('fade'); // Certifique-se de que 'fade' seja o ID do fundo do modal

    // Se houver algum erro, abre o modal de cadastro automaticamente
    if (erroLogin || erroEmail || erroSenha) {
        openModal(modalCadastro); // Chama a função que abre o modal com efeito de fade-in
    }
};

    </script>
    
  <script src="../js/script.js"></script> 

</body>     
</html>