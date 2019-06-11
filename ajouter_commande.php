<?php 
session_start();
if (count($_SESSION)==0)
header('location: login.php');
?>

<?php
extract($_GET);
$id=$_GET['id'];
$idp=$_GET['idp'];
echo $id.$idp;

include "GestionUser.php";
		$ges = new GestionUser ();
        $ges->addcommande($id,$idp);
?>