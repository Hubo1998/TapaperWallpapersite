<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/loginstyle.css" type="text/css">
    <title>Login Page</title>
</head>

<body>
    <?php require("layout/header.php") ?>

    <form action="checklogin.php" method="post">
        <div class="imgcontainer">
            <img src="images/avatar.png" alt="avatar picture" class="avatar">
        </div>

        <div class="container">
            <label for="login">Login</label>
            <input type="text" name="login" placeholder="Username" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </div>

    </form>
    <?php require("layout/footer.php") ?>
</body>

</html>