<?php

$con = new mysqli("localhost", "root", "", "dbkitap");

var_dump($_GET);

if (isset($_GET['cd_sala'])) {
    $idSala = intval($_GET['cd_sala']);

    $sql = "SELECT * FROM tb_salas WHERE cd_sala = '$idSala'";
    $res = $con->query($sql);


    if ($res && $res->num_rows > 0) {
        
        header("Location: ../pages/salasOpen.php?cd_sala='$idSala'");
        
    } else {
        echo "Sala não encontrada.";
    }
} else {
    echo "ID da sala não especificado.";
}

