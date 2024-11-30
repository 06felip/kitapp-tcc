<?php

$con = new mysqli("localhost", "root", "", "dbkitap");
$cdLogado = $_SESSION['cd_usuario'];
//query para a aba de salas

$sql = "SELECT 
        tb_salas.*, 
        tb_usuario_salas.status_user AS status_usuario, 
        (SELECT COUNT(*) FROM tb_usuario_salas WHERE tb_usuario_salas.cd_sala = tb_salas.cd_sala AND tb_usuario_salas.status_user = 'ativo') AS total_usuarios
        FROM 
        tb_salas
        LEFT JOIN 
        tb_usuario_salas 
        ON tb_salas.cd_sala = tb_usuario_salas.cd_sala 
        AND tb_usuario_salas.cd_usuario = '$cdLogado'";


$res = $con->query($sql);

//query para a aba home
$sqlHome = "SELECT 
        tb_salas.*, 
        tb_usuario_salas.status_user AS status_usuario, 
        (SELECT COUNT(*) FROM tb_usuario_salas WHERE tb_usuario_salas.cd_sala = tb_salas.cd_sala AND tb_usuario_salas.status_user = 'ativo') AS total_usuarios
        FROM 
        tb_salas
        LEFT JOIN 
        tb_usuario_salas 
        ON tb_salas.cd_sala = tb_usuario_salas.cd_sala 
        AND tb_usuario_salas.cd_usuario = '$cdLogado' LIMIT 8";

$resHome = $con->query($sqlHome);


