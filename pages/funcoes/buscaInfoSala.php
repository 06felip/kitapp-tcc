<?php 


$con = new mysqli("localhost", "root", "", "dbkitap");

$idSala = $_SESSION['cd_sala'];
$idUSer = $_SESSION['cd_usuario'];

//busca das informacoes da sala
$sqlBusca = "SELECT * from tb_salas where cd_sala = '$idSala'";

$resultBusca = $con->query($sqlBusca);

if($resultBusca && $resultBusca->num_rows > 0){
    $buscaInfo = $resultBusca->fetch_assoc();
}else{
    echo "informacoes nao encontradas";
}

//agora vou fazer a lista dos usuarios que estao na sala

$sqlListaStatus = "SELECT 
    tb_usuario.log_usuario, 
    tb_usuario.cd_usuario, 
    tb_usuario_livros.status_livro, 
    tb_salas.cd_livro 
FROM 
    tb_usuario_salas
INNER JOIN 
    tb_usuario
    ON tb_usuario_salas.cd_usuario = tb_usuario.cd_usuario
INNER JOIN 
    tb_salas
    ON tb_usuario_salas.cd_sala = tb_salas.cd_sala
LEFT JOIN 
    tb_usuario_livros
    ON tb_usuario_livros.cd_usuario = tb_usuario.cd_usuario
    AND tb_usuario_livros.cd_livro = tb_salas.cd_livro
WHERE 
    tb_salas.cd_sala = $idSala
GROUP BY 
    tb_usuario.cd_usuario
";



$resultLista = $con->query($sqlListaStatus);
