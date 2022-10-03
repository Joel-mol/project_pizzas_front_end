<?php

session_start();
if ($_SESSION['logueado']) {

    include_once("config_product.php");
    include_once("db.php");
    $link = new Db();
    $idDel = $_GET["q"];
    echo $idDel;
    $sql = "delete from products where id_product=" . $idDel;
    $stmt = $link->prepare($sql);
    $stmt->execute();
    header('location:welcome.php');
}
