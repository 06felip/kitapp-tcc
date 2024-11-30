<?php
session_start();
$con = new mysqli("localhost", "root", "", "dbkitap");

$cdUsuario = $_SESSION['cd_usuario'];
$cdSala = $_SESSION['cd_sala'];

if (isset($_SESSION['cd_sala']) && isset($_SESSION['cd_usuario'])) {
    
    
    $sql = "UPDATE tb_usuario_salas 
        SET status_user = 'saiu' 
        WHERE cd_usuario = '$cdUsuario' AND cd_sala = '$cdSala' AND status_user = 'ativo'";

    $result = $con->query($sql);
    

    if($result == true){
        echo "<script>alert('Você não faz mais parte desta sala');</script>";
        echo "<script>location.href='../salas.php'</script>";
    }

}else{
   echo "usuario :$cdUsuario";
   echo "<br>";
   echo "sala: $cdSala";
}