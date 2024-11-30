<?php
session_start();

unset($_SESSION['login_email']);
unset($_SESSION['senha']);

session_destroy();

header("Location:../index.php");

?>