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
        <a href="perfil.php"><button>Voltar</button></a>

        <div class="logo">
           <a href="home.php"> <img src="../images/Imagem1-removebg-preview.png" class="img-logo" ></a>
        </div>
        
    </nav>

    <section class="salasIntegradas">
        <div class="introHistorico">

        </div>

        <div class="salasAtivas">

             <h1>salas participantes</h1>

                <div class="container-salas">
                    <div class="caixas">

                        <?php while ($sala = $resultAtivo->fetch_assoc()): ?>

                            <a data-id="<?php echo $sala['cd_sala']?>" onclick="confirmarEntrada(this)">
                                <div class="sala">
                                    <div class="sala-content">
                                        <div class="header-sala">
                                            <div class="img-sala">
                                                
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
                </div>


        </div>

        <div class="salasSaidas">

             <h1>salas que voçê não faz mais parte</h1>

                <div class="container-salas">
                    <div class="caixas">

                        <?php while ($salaSaiu = $resultSaiu->fetch_assoc()): ?>

                            <a data-id="<?php echo $salaSaiu['cd_sala']?>" onclick="confirmarEntrada(this)">
                                <div class="sala">
                                    <div class="sala-content">
                                        <div class="header-sala">
                                            <div class="img-sala">
                                                
                                            </div>
                
                                            <div class="intro-sala">
                                                <h1><?php echo htmlspecialchars($salaSaiu['titulo_sala']); ?></h1>
                                                <h3><?php echo htmlspecialchars($salaSaiu['subtitulo_sala']); ?></h3>
                                            </div>
                                            
                                        </div>
                                        
                                            <p><?php echo htmlspecialchars($salaSaiu['desc_sala']); ?></p>
                
                
                                    </div>

                                    
                                </div>
                            </a>
                        <?php endwhile; ?>
                        
                        
                    
                    </div>
                </div>


        </div>
    </section>

</body>
</html> 