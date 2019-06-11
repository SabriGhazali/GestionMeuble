<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php
session_start();
$_SESSION=array();
session_destroy();
header('Location: login.php');
?>
</body>
</html>