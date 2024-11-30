<?php
session_start();

$con = new mysqli("localhost", "root", "", "dbkitap");

$idLogado = $_SESSION['cd_usuario'];

$nome = $_POST['nome_completo'];
$login = $_POST['login'];
$data = $_POST['data_nascimento'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$senha = $_POST['senha'];

// if(!isset($data) || !isset($tel)){
//     $sql = "INSERT into tb_usuario (niver_user , tel_user) values ('$data' , '$tel') where cd_usuario = '$idLogado'";
// }

$sql = "UPDATE tb_usuario SET 
    nm_usuario = '$nome',
    log_usuario = '$login',
    email_usuario = '$email',
    niver_user = '$data',
    tel_user = '$tel'
    where cd_usuario = '$idLogado'";

    $res = $con -> query($sql) ;

    if($res == true){
        echo "<script>alert('informações atualizadas com sucesso');</script>";
        echo "<script>location.href='../infoUser.php'</script>";
    }else{
        echo "<script>alert('falha ao atualizar as informações');</script>";
        echo "<script>location.href='../infoUser.php'</script>";    
    }
