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
        $idkategoria = $_GET['id'];
        $datadodania = $_GET['data'];
        echo "<div class='text'>Edycja kategorii o ID = $idkategoria, data dodania - $datadodania</div>";
    } elseif ($_GET['error'] == 'numeric') {
        echo "<div class='text'>Nazwa kategorii nie może zawierać samych liczb.</div>";
    }
    ?>
    <form action="tableadd.php" method="POST">
        <?php if (isset($_GET['nazwa'])) {
            //EDYCJA
            echo "
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='kategoria'>
            <input type='hidden' name='column' value='nazwa'>
            <input type='hidden' name='id' value='$idkategoria'>
            <label for='nazwa'>Nazwa kategorii:</label>
            <input type='text' name='nazwa' value='$text'>
            <input type='submit' value='Edytuj kategorię'>";
        } else {
            //DODAWANIE
            echo "
            <label for='nazwa'>Nazwa kategorii:</label>
            <input type='hidden' name='table' value='kategoria'>
            <input type='text' name='nazwa' required>
            <input type='submit' value='Dodaj kategorię'>";
        } ?>
        
    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>