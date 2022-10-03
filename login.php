<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />

<body>

</body>

</html>


<?php


include_once "config_login.php";

$usr = $_POST["username"];
$pass = $_POST["password"];
$hashed_pass = hash('sha256', $pass);

include_once('db.php');
$link = new Db();


$sql = "SELECT * FROM users WHERE (username=:usr or email=:usr) and (password=:hashed_pass) and (active='si')";
//al cambiar '$link' hay que cambiar 'prepare' por un codigo nuevo //
$stmt = $link->prepare($sql);
$stmt->bindValue(':usr', $usr);
$stmt->bindValue(':hashed_pass', $hashed_pass);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == 0) {
?>
    <div class='alert alert-danger'>
        <a href='login.html' class='close' data-dimiss='alert'></a>
        <div class='text-center'>
            <hs><strong>¡error!</strong>login invalido</hs>
        </div>
    </div>
<?php
} else {

    session_start();
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $_SESSION['time'] = date('H:i:s');
    $_SESSION['username'] = $usr;
    $_SESSION['logueado'] = true;
    header('location:welcome.php');
}
//funciona//
?>