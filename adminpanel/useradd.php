<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="../css/adminpanel.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/admin.ico">
    <title>Admin Panel</title>
</head>

<body>
    <?php require __DIR__ . "../../layout/header.php";
    if ($_SESSION['login'] != 'OK') {
        header("Location: /index.php");
    }
    if (isset($_GET['nazwa'])) {
        $text = $_GET['nazwa'];
        $idadmin = $_GET['id'];
        $datadodania = $_GET['data'];
        echo "<div class='text'>Edycja użytkownika o ID = $idadmin, data dodania - $datadodania</div>";
    } 
    ?>
    <form action="tableadd.php" method="POST">
        <?php if (isset($_GET['nazwa'])) {
            //EDYCJA
            echo "
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='admin'>
            <input type='hidden' name='column' value='login'>
            <input type='hidden' name='id' value='$idadmin'>
            <label for='nazwa'>Nazwa użytkownika:</label>
            <input type='text' name='nazwa' value='$text'>
            <input type='submit' value='Edytuj login'>";
        } else {
            //DODAWANIE
            echo "
            <label for='nazwa'>Nazwa użytkownika:</label>
            <input type='hidden' name='table' value='admin'>
            <input type='text' name='nazwa' required><br>
            <label for='haslo'>Hasło:</label>
            <input type='password' name='haslo' required><br>
            <input type='submit' value='Dodaj użytkownika'>";
        } ?>
    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>