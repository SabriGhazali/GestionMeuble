<?php
session_start();
include "GestionUser.php";
extract($_POST);
$g=new GestionUser();
$g->verif($login,$pwd);
?>
