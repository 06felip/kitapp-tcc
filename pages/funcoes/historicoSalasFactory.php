<?php

session_start();

$con = new mysqli("localhost", "root", "", "dbkitap");

 $cdUsuario = $_SESSION['cd_usuario'];

 //resultado para salas ativas

$sqlAtivo = "SELECT * from tb_salas
    INNER JOIN tb_usuario_salas on
    tb_salas.cd_sala = tb_usuario_salas.cd_sala where
    tb_usuario_salas.cd_usuario = '$cdUsuario' AND tb_usuario_salas.status_user = 'ativo'";

$resultAtivo = $con->query($sqlAtivo);

 //resultado para as salas em que o usuario saiu

 $sqlSaiu = "SELECT * from tb_salas
 INNER JOIN tb_usuario_salas on
 tb_salas.cd_sala = tb_usuario_salas.cd_sala where
 tb_usuario_salas.cd_usuario = '$cdUsuario' AND tb_usuario_salas.status_user = 'saiu'";

$resultSaiu = $con->query($sqlSaiu);



    