<?php
session_start();

$con = new mysqli("localhost", "root", "", "dbkitap");


if (isset($_SESSION['cd_usuario'])) {
    $idLogado = $_SESSION['cd_usuario'];

    // Buscar o ID do usuário baseado no email ou login
    $sql = "SELECT cd_usuario, log_usuario FROM tb_usuario WHERE cd_usuario = '$idLogado'";
    
    $res = $con->query($sql);

    if ($res && $res->num_rows > 0) {
        
        $usuario = $res->fetch_assoc();
        echo json_encode($usuario);
    } else {
        
        http_response_code(404);
        echo json_encode(['message' => 'Usuário não encontrado']);
    }
} else {

    http_response_code(401);
    echo json_encode(['message' => 'Usuário não autenticado']);
}
?>
