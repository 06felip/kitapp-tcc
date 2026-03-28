<?php

session_start();

$con = new mysqli("localhost", "root", "", "dbkitap");

 $cdUsuario = $_SESSION['cd_usuario'];

// campo visualiozados livro

 $sqlvisualizado = "SELECT * from tb_livros
 INNER JOIN tb_usuario_livros on
 tb_livros.cd_livro = tb_usuario_livros.cd_livro 
  where tb_usuario_livros.cd_usuario = '$cdUsuario' AND status_livro = 'visualizado'";


 $resVisu = $con->query($sqlvisualizado);



 //campo visualiozados livro

 $sqlAguard = "SELECT * from tb_livros
 INNER JOIN tb_usuario_livros on
 tb_livros.cd_livro = tb_usuario_livros.cd_livro 
  where tb_usuario_livros.cd_usuario = '$cdUsuario' AND status_livro = 'aguardando'";
 $resAguard = $con->query($sqlAguard);



 //campo visualiozados livro

 $sqlLido = "SELECT * from tb_livros
 INNER JOIN tb_usuario_livros on
 tb_livros.cd_livro = tb_usuario_livros.cd_livro 
  where tb_usuario_livros.cd_usuario = '$cdUsuario' AND status_livro = 'lido'";
 $resLido = $con->query($sqlLido);

 

 //campo visualiozados livro

 $sqlLend = "SELECT * from tb_livros
 INNER JOIN tb_usuario_livros on
 tb_livros.cd_livro = tb_usuario_livros.cd_livro 
  where tb_usuario_livros.cd_usuario = '$cdUsuario' AND status_livro = 'lendo'";
 $resLend = $con->query($sqlLend);




 