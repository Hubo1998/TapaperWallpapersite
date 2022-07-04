<?php
session_start();
$user = '';
$host = '';
$pass = '';
$db = "";
require_once("database/db.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$login=$_POST['login'];
$haslo=$_POST['password'];
$haslozbazy=DBShortQuery("Select haslo from student where login='$login'");

if(md5($haslo)==$haslozbazy){
    $_SESSION['login']='OK';
    header("Location: index.php");
}else{
    header("Location: Login.php?log=incorrect");
}
?>
</body>
</html>