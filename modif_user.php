<?php 
session_start();
if (count($_SESSION)==0)
header('location: login.php');
?>

<?php
extract($_GET);
$id=$_GET['id'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$adresse=$_GET['adresse'];
$date=$_GET['date'];

$cin=$_GET['cin'];
include "GestionUser.php";
		$ges = new GestionUser ();
        $ges->modifier($nom,$prenom,$adresse,$cin,$id,$date);
?>