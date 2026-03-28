<?php
$con = new mysqli("localhost", "root", "", "dbkitap");

$sqlHome = "SELECT * from tb_livros LIMIT 8";

$livrosHome = $con->query($sqlHome);


$sqllivro = "SELECT * from tb_livros";

$livrosIndica = $con->query($sqllivro);
