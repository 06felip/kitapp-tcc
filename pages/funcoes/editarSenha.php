<?php 
session_start();

// Conexão com o banco
$con = new mysqli("localhost", "root", "", "dbkitap");


// ID do usuário logado e dados do formulário
$idLogado = $_SESSION['cd_usuario'];
$senhaAtual = $_POST['senhaAtual'];
$novaSenha = $_POST['senhaNova'];
$confirmSenha = $_POST['confirmSenha'];

// Consulta a senha atual no banco de dados
$sql = "SELECT senha_usuario FROM tb_usuario WHERE cd_usuario = '$idLogado'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $senhaBanco = $row['senha_usuario'];

    // Verifica se a senha atual está correta
    if ($senhaBanco === $senhaAtual) {
        if ($novaSenha === $senhaBanco) {
            echo "<script>alert('Você já está usando essa senha!');</script>";
            echo "<script>location.href='../infoUser.php'</script>";
        } else {
            if ($novaSenha === $confirmSenha) {
                // Atualiza a senha no banco de dados
                $sqlUpdate = "UPDATE tb_usuario SET senha_usuario = '$novaSenha' WHERE cd_usuario = '$idLogado'";
                $updateSenha = $con->query($sqlUpdate);

                if ($updateSenha) {
                    echo "<script>alert('Senha atualizada!');</script>";
                    echo "<script>location.href='../infoUser.php'</script>";
                } else {
                    echo "<script>alert('Erro ao atualizar a senha.');</script>";
                }
            } else {
                echo "<script>alert('As novas senhas não são iguais!');</script>";
                echo "<script>location.href='../infoUser.php'</script>";
            }
        }
    } else {
        echo "<script>alert('Senha atual incorreta! Tente novamente');</script>";
        echo "<script>location.href='../infoUser.php'</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!');</script>";
}

?>
