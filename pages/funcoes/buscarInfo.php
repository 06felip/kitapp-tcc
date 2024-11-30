<?php

$con = new mysqli("localhost", "root", "", "dbkitap");



if(isset($_SESSION['login_email'])){

  $idLogado = $_SESSION['cd_usuario'];
 
  $sql = "SELECT * from tb_usuario where cd_usuario = '$idLogado'";

  $res = $con->query($sql);

    if($res->num_rows > 0){
      $row = $res->fetch_assoc();

      
      $login = $row['log_usuario'];
      $nome = $row['nm_usuario'];
      $email = $row['email_usuario'];
      $data = $row['niver_user'];
      $tel = $row['tel_user'];
      $senha = $row['senha_usuario'];

    }else{

      echo "dados nao encontrados";
    }

}else{
  echo "sem session";
}





