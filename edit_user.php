<?php 
session_start();
if (count($_SESSION)==0)
header('location: login.php');
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Modification Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</head>
<?php
extract($_GET);
$id=$_GET['id'];
echo "<div class=\"container\"><h3>Vous avez selectionnee l'id n°: $id</h3>";
include "GestionUser.php";
$ges = new GestionUser ();
    $tab=$ges->rechercher($id); 
 
    foreach($tab as $row){
    ?>
<center><form method="get" action="modif_user.php" class="form-horizontal"> <br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="id">Id:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" value="<?php echo $row['id']; ?>" name="id">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" value="<?php echo $row['nom']; ?>" name="nom">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="prenom">Prenom:</label>
            </td>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="prenom" value="<?php echo $row['prenom']; ?>" name="prenom">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="adresse">Adresse:</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="adresse" value="<?php echo $row['adresse']; ?>" name="adresse">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cin">Cin:</label>

            <div class="col-sm-10">

                <input type="text" class="form-control" id="cin" value="<?php echo $row['cin']; ?>" name="cin">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cin">Date de Livraison:</label>

            <div class="col-sm-10">

                <input type="date" class="form-control" id="date" value="<?php echo $row['date']; ?>" name="date">
            </div>
        </div>

<input type="submit" class="btn btn-primary" value="modifier"><br>
<a href="aff_user.php">Retour</a>
</form></center>
    <?php } ?>

</body>
</html>
