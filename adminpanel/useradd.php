<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="../css/adminpanel.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/admin.ico">
    <title>Admin Panel</title>
</head>

<body>
    <?php require __DIR__ . "../../functions/dbfirst.php";
    require __DIR__ . "../../layout/header.php";
    if ($_SESSION['login'] != 'OK') {
        header("Location: /index.php");
    }
    if (isset($_GET['nazwa'])) {
        $text = $_GET['nazwa'];
        $idadmin = $_GET['id'];
        $releasedate = $_GET['data'];
        echo "<div class='text'>Edycja użytkownika o ID = $idadmin, data dodania - $releasedate</div>";
        if($_GET['error'] == 'login'){
            echo "<div class='text'>Istnieje już użytkownik o takiej nazwie.</div>";
        }
    } elseif ($_GET['error'] == 'numeric') {
        echo "<div class='text'>Pola nie mogą zawierać samych liczb.</div>";
    } elseif ($_GET['error'] == 'password') {
        echo "<div class='text'>Hasłą muszą być takie same.</div>";
    } elseif($_GET['error'] == 'login'){
        echo "<div class='text'>Istnieje już użytkownik o takiej nazwie.</div>";
    }
    ?>
    <form action="tableadd.php" method="POST">
        <?php if (isset($_GET['nazwa'])) {
            //EDYCJA
            echo "<div class='formbox'>
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='admin'>
            <input type='hidden' name='column' value='login'>
            <input type='hidden' name='id' value='$idadmin'>
            <input type='hidden' name='date' value='$releasedate'>
            <label for='nazwa' class='form-label'>Nazwa użytkownika:</label>
            <input type='text' id='nazwa' name='nazwa' value='$text' class='form-control'>
            <button type='submit' class='btn btn-primary'>Edytuj login</button></div>";
        } else {
            //DODAWANIE
            echo "<div class='formbox'>
            <input type='hidden' name='table' value='admin'>
            <label for='nazwa' class='form-label'>Nazwa użytkownika:</label>
            <input type='text' id='nazwa' name='nazwa' class='form-control' required><br>
            <label for='haslo' class='form-label'>Hasło:</label>
            <input type='password' id='haslo' name='haslo' class='form-control' required><br>
            <label for='rehaslo' class='form-label'>Powtórz Hasło:</label>
            <input type='password' id='rehaslo' name='rehaslo' class='form-control' required><br>
            <button type='submit' class='btn btn-primary'>Dodaj użytkownika</button></div>";
        } ?>
    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>