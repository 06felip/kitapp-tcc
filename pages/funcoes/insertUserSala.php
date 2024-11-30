<?php 
session_start();
$con = new mysqli("localhost", "root", "", "dbkitap");

// Verifica se o ID da sala foi passado via GET
if (isset($_GET['cd_sala'])) 
{
    $idUsuario = $_SESSION['cd_usuario'];
    $idSala = intval($_GET['cd_sala']);

    $_SESSION['cd_sala'] = $idSala;

    
    $sql = "SELECT * FROM tb_salas WHERE cd_sala = '$idSala'";
    $res = $con->query($sql);

    if ($res && $res->num_rows > 0) 
    {

        // Verifica quantos usuários ativos estão na sala
        $sqlCount = "SELECT COUNT(*) AS total_usuarios FROM tb_usuario_salas WHERE cd_sala = '$idSala' AND status_user = 'ativo'";
        $resultCount = $con->query($sqlCount);

        $row = $resultCount->fetch_assoc();
        $totalUsuarios = $row['total_usuarios'];

        if($totalUsuarios < 10)
        {
        
                $busca = "SELECT * FROM tb_usuario_salas WHERE cd_usuario = '$idUsuario' AND cd_sala = '$idSala'";
                $resUsuarioSala = $con->query($busca);

                if ($resUsuarioSala->num_rows === 0) 
                {
                    
                    $sqlInserir = "INSERT INTO tb_usuario_salas (cd_usuario_salas, cd_usuario, cd_sala) VALUES ('', '$idUsuario', '$idSala')";
                    $inseri = $con->query($sqlInserir);

                    if($inseri === true){
                    
                    echo "<script>alert('Usuário integrado na sala');</script>";
                    echo "<script>location.href=' ../salasOpen.php?cd_sala=$idSala'</script>";
                    }
                }else {
                    $sqlReentrar = "UPDATE tb_usuario_salas 
                    SET status_user = 'ativo' 
                    WHERE cd_usuario = '$idUsuario' AND cd_sala = '$idSala' AND status_user = 'saiu'";
                    $resultReentrar = $con->query($sqlReentrar);

                    if($resultReentrar === true){
                            
                        echo "<script>location.href=' ../salasOpen.php?cd_sala=$idSala'</script>";
                    }
                    
                    
                }
                    
        }else{
            echo "<script>alert('A sala está cheia. Limite de 10 usuários atingido.');</script>";
        }
            

    } else {
        echo "Sala não encontrada.";
    }
} else {
    echo "ID da sala não especificado.";
}
