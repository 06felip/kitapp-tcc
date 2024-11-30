<?php

$con = new mysqli("localhost", "root", "", "dbkitap");

$sql = "SELECT * from tb_indicacao";

$res = $con->query($sql);