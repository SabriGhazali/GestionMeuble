<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Client</title>
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
include "GestionUser.php";
$g=new GestionUser();
$tab= $g->getallusers();

?>
<?php

?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php echo "<h2>Nombre de clients: ".count($tab)."</h2>"; ?>
        </div>
        <div class="col-md-3">
            <?php if(count($_SESSION)==0)
                echo '<a href="login.php"><button class="btn btn-success btn-md" title="Connexion" style="margin-top:15px">Connexion <span class="glyphicon glyphicon-log-in"></span></button></a>';
            else
                echo '<a href="deconnexion.php"><button class="btn btn-info btn-md" title="Déconnexion" style="margin-top:15px">Déconnexion <span class="glyphicon glyphicon-log-out"></span></button></a>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordred table-striped">
                <tr>
                    <th>ID Client</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Cin</th>
                    <th>Adresse</th>
                    <th>Date de livraison</th>

                    <th style="padding-left:60px;">Action</th>
                </tr>
                <?php
                foreach($tab as $row)
                {
                    $id=$row['id'];
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nom']."</td>";
                    echo "<td>".$row['prenom']."</td>";
                    echo "<td>".$row['cin']."</td>";
                    echo "<td>".$row['adresse']."</td>";
                    echo "<td>".$row['date_de_livraison']."</td>";



                    echo "<td><a href='supprime_user.php?id=$id' onclick='return confirm(\" voulez vous supprimer? \")'  ><button class='btn btn-danger btn-xs' title='Supprimer'>Supprimer <span class='glyphicon glyphicon-trash'></span></button></a> &nbsp;&nbsp; ";
                    echo "<a href='edit_user.php?id=$id'><button class='btn btn-primary btn-xs' title='Editer'>Editer <span class='glyphicon glyphicon-pencil'></span></button></a>&nbsp;&nbsp; ";
                    echo "<a href='index.php?id=$id'><button class='btn btn-success btn-xs' title='Commande'>Passer une commande <span class='glyphicon glyphicon-shopping-cart'></span></button></a>&nbsp;&nbsp; ";
                    echo "<a href='commande.php?id=$id'><button class='btn btn-info btn-xs' title='Voir Commande'>Voir la commande <span class='glyphicon glyphicon-eye-open'></span></button></a></td>";

                    echo "</tr>";
                }
                ?>
            </table>
            <p><a href="ajout_user.html"><button class="btn btn-warning btn-sm" title="nouveau user">Ajouter un nouveau client</button></a></p>
        </div>
    </div>
</div>

</body>
</html>