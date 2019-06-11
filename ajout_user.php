<?php 
session_start();
if (count($_SESSION)==0)
header('location: login.php');
?>
<?php
extract($_GET);

include "GestionUser.php";
		$ges = new GestionUser ();
        $ges->ajout($nom,$prenom,$adresse,$cin,$date);


?>