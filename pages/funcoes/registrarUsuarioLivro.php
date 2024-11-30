<?php
session_start();
$con = new mysqli("localhost", "root", "", "dbkitap");

$acao = $_GET['acao'];
$cdLivro = $_GET['cd_livro'];
$caminho = urldecode($_GET['caminho']);
$cdUsuario = $_SESSION['cd_usuario'];

$sql = "SELECT * FROM tb_usuario_livros WHERE cd_usuario = '$cdUsuario' AND cd_livro = '$cdLivro'";
$res = $con->query($sql);

if($res->num_rows == 0) {
    $sqlInsert = "INSERT INTO tb_usuario_livros (cd_usuario, cd_livro) VALUES ('$cdUsuario', '$cdLivro')";
    $resInsert = $con->query($sqlInsert);

}

header("Location: $caminho");