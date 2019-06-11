<!DOCTYPE html>
<html xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

<div class = "container">
    <div class="wrapper">
        <form action="verif.php" method="post" name="Login_Form" class="form-signin">
            <h3 class="form-signin-heading mt-sm-4">Merci de vous authentifier</h3>

            <input type="text" class="form-control" name="login" placeholder="Login" required autofocus="" />
            <input type="password" class="form-control" name="pwd" placeholder="Password" required/>
            <button class="btn btn-lg btn-primary btn-block"  type="Submit">Login</button>
        </form>
        <div style="color:red; text-align:center;">
            <?php
            if(isset($_GET['erreur']))
                echo "Username ou Mot de passe incorrecte";
            ?>
        </div>
    </div>
</div>
</div>

</body>
</html>