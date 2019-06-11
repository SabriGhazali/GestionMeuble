<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Commande</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: beige;
        }
    </style>
</head>
<body>
<?php
session_start();
extract($_GET);
$id=$_GET['id'];
include "GestionUser.php";
$g=new GestionUser();
$tab= $g->getcommandebyid($id);

?>
<?php

?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php echo "<h2>Nombre de Commande: ".count($tab)."</h2>"; ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordred table-striped" >
                <tr>
                    <th>ID Client</th>
                    <th>Nom Produit</th>
                    <th>Prix</th>

                    <th style="padding-left:60px;">Action</th>
                </tr>
                <?php
                $s=0;
                foreach($tab as $row)
                {
                    echo "<tr>";
                    echo "<td>".$id."</td>";
                    echo "<td>".$row['nom_produit']."</td>";
                    echo "<td>".$row['prix']." DT</td>";
                   $idp=$row['id'];
                    $s=$s+$row['prix'];

                    echo "<td><a href='supprime_commande.php?id=$id&idp=$idp' onclick='return confirm(\" voulez vous supprimer? \")'  ><button class='btn btn-danger btn-xs' title='Supprimer'>Supprimer <span class='glyphicon glyphicon-trash'></span></button></a> &nbsp;&nbsp; ";
                    echo "</tr>";
                }
                ?>
                <?php
                if($s!=0)
                echo "    <tr><td></td><td>Total a payer :</td><td> ". $s/count($tab) ." DT</td></tr> "; ?>
            </table>
            <?PHP
          ECHO"  <p><a href=index.php?id=$id><button class=btn btn-warning btn-sm title=nouvelle commande>Ajouter un nouveau produit</button></a> &nbsp;&nbsp; <a href=aff_user.php><button class=btn btn-warning btn-sm title=nouvelle commande>Interface Client</button></a></p>  ";
            ?>
        </div>
    </div>
</div>

</body>
<footer>
    <center>  <input id="impression" name="impression" type="button" onclick="window.print()" value="Imprimer" /> </center>
</footer>
</html>