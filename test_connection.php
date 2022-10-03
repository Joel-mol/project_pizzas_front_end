<?php

include_once "config_login.php";
function openCon()

{
    $dsn = 'mysql:dbname=' . DATABASE_NAME . ';host=' . SERVER_NAME;
    $link = new pdo($dsn, USER_NAME, PASSWORD);
    return $link;
}
function closeCon($a){
    $a=null;
}
//invocation//
$con=openCon();
//operaciones crud
$sql="select username,email from users";
$row=$con->query($sql);
foreach($row as $col){
    echo"<br>";
    echo $col["username"];
    echo"<br>";
    echo $col["email"];
    echo"<br>";
    echo "--------";
}

closeCon($con);
?>