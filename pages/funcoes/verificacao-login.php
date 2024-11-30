<?php

    if (!isset($_SESSION['login_email']) && !isset($_SESSION['senha'])) 
    {
        echo "<script>alert('Você não está logado, faça seu login')</script>";

        unset($_SESSION['login_email']);
        unset($_SESSION['senha']);
        unset($_SESSION['cd_usuario']);


        header("Location: index.php");
    } 
    else
    {
        $login = $_SESSION['login_email'];

        $con = new mysqli("localhost", "root", "", "dbkitap");


        $sql = "SELECT cd_usuario FROM tb_usuario where log_usuario = '$login'";

        $result = $con->query($sql);
        if($result-> num_rows > 0){

            $row = $result->fetch_assoc();
            $_SESSION['cd_usuario'] = $row['cd_usuario'];
            
        }


       
    }



