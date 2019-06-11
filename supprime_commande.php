<?php 
session_start();
if (count($_SESSION)==0)
header('location: login.php');
?>
<?php
extract($_GET);
$idp=$_GET['idp'];
$id=$_GET['id'];
include "GestionUser.php";
		$ges = new GestionUser ();
        $ges->suppression_commande($id,$idp);


?>