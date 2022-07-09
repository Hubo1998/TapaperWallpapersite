<?php
session_start();
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
    if ($_SESSION['login'] == 'OK') {
        $_SESSION['login'] = 'NOTOK';
        header("Location: index.php");
    } else {
        header("Location: Login.php");
    }

    ?>
</body>

</html>