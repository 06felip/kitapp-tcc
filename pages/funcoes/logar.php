<?php
    session_start();

    $con = new mysqli("localhost", "root", "", "dbkitap");

        
        $loginEmail = $_POST["login_email"];
        $senha = $_POST["senha"];


    $sql = "SELECT * from tb_usuario where (log_usuario = '$loginEmail' OR email_usuario = '$loginEmail') and senha_usuario = '$senha'";

    $res = $con->query($sql)->num_rows>0;



    if($res > 0){
        $_SESSION['login_email'] = $loginEmail;
        $_SESSION['senha'] = $senha;
        

        echo "<script>alert('Login concluido');</script>";
        echo "<script>window.location.href = '../home.php';</script>";
        
    }else{
        echo "<script>alert('Falha ao logar');</script>";
        echo "<script>window.location.href = '../index.php';</script>";
    }





?>
