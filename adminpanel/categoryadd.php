<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/headerfooterstyle.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Admin Panel</title>
</head>

<body>
    <?php require __DIR__ . "../../layout/header.php"; 
    if($_SESSION['login']!='OK'){header("Location: /index.php");}?>

    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>