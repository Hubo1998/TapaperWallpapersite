<?php require(__DIR__ . "/functions/dbfirst.php");?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Strona logowania do panelu administracyjnego."/>
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/loginstyle.css" type="text/css">
    <title>Login Page</title>
</head>

<body>
    <?php require __DIR__ . "/layout/header.php"; ?>

    <form action="/supportfiles/checklogin.php" method="post">
        <div class="imgcontainer">
            <img src="images/avatar.png" alt="avatar picture" class="avatar">
        </div>

        <div class="container">
            <label for="login">Nazwa użytkownika</label>
            <input type="text" name="login" placeholder="Nazwa użytkownika" required>
            <label for="password">Hasło</label>
            <input type="password" name="password" placeholder="Hasło" required>

            <button type="submit">Zaloguj</button>
        </div>

    </form>
    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>