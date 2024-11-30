<?php
$con = new mysqli("localhost", "root", "", "dbkitap");

$sqlHome = "SELECT * from tb_livros LIMIT 8";

$livrosHome = $con->query($sqlHome);
