<?php require __DIR__ . "../../functions/dbfirst.php"; ?>
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
    $login = $_POST['login'];
    $haslo = $_POST['password'];
    $stmt = DBQuery("Select password from admin where login=:login");
    $stmt->bindParam(':login',$login);
    $haslozbazy=Execute($stmt);

    if (hash('sha256', $haslo) == $haslozbazy[0][0]) {
        $_SESSION['login'] = 'OK';
        header("Location: /index.php");
    } else {
        header("Location: /Login.php?log=incorrect");
    }
    ?>
</body>

</html>