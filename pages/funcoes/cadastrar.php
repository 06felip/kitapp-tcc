<?php
session_start(); 
$con = new mysqli("localhost", "root", "", "dbkitap");

// Inicializa as variáveis de erro
$_SESSION['erroLogin'] = '';
$_SESSION['erroEmail'] = '';
$_SESSION['erroSenha'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmar-senha"];

    // Verifica se o login já existe no banco
    $sqlLogin = "SELECT * FROM tb_usuario WHERE log_usuario = '$login'";
    $resLogin = $con->query($sqlLogin);

    if ($resLogin->num_rows > 0) {
        $_SESSION['erroLogin'] = "Login já cadastrado! Tente outro.";
    }

    // Verifica se o email já existe no banco
    $sqlEmail = "SELECT * FROM tb_usuario WHERE email_usuario = '$email'";
    $resEmail = $con->query($sqlEmail);

    if ($resEmail->num_rows > 0) {
        $_SESSION['erroEmail'] = "Email já cadastrado! Tente outro.";
    }

    // Verifica se as senhas coincidem
    if ($senha !== $confirmarSenha) {
        $_SESSION['erroSenha'] = "As senhas não coincidem.";
    }

    // Verifica se há algum erro antes de inserir no banco
    if (empty($_SESSION['erroLogin']) && empty($_SESSION['erroEmail']) && empty($_SESSION['erroSenha'])) {
        $sql = "INSERT INTO tb_usuario (cd_usuario, nm_usuario, log_usuario, email_usuario, senha_usuario) 
                VALUES ('', '$nome', '$login', '$email', '$senha')";
        
        $res = $con->query($sql);
        if ($res == true) {
            echo "<script>alert('Cadastro feito com sucesso!'); location.href='../index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Falha ao cadastrar :(');</script>";
        }
    } else {
        header("Location: ../index.php"); 
        }
}
