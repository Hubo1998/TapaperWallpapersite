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
    if (isset($_GET['name'])) {
        $text = $_GET['name'];
        $idcategory = $_GET['id'];
        $releasedate = $_GET['date'];
        echo "<div class='text'>Edycja kategorii o ID = $idcategory, data dodania - $releasedate</div>";
        if ($_GET['error'] == 'name') {
            echo "<div class='text'>Już istnieje taka name kategorii.</div>";
        }
    } elseif ($_GET['error'] == 'numeric') {
        echo "<div class='text'>Nazwa kategorii nie może zawierać samych liczb.</div>";
    } elseif ($_GET['error'] == 'name') {
        echo "<div class='text'>Już istnieje taka name kategorii.</div>";
    }
    ?>
    <form action="tableadd.php" method="POST">
        <?php if (isset($_GET['name'])) {
            //EDYCJA
            echo "<div class='formbox'>
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='category'>
            <input type='hidden' name='column' value='name'>
            <input type='hidden' name='id' value='$idcategory'>
            <input type='hidden' name='date' value='$releasedate'>
            <label for='name' class='form-label'>Nazwa kategorii:</label>
            <input type='text' id='name' name='name' value='$text' class='form-control'>
            <button type='submit' class='btn btn-primary'>Edytuj kategorię</button></div>";
        } else {
            //DODAWANIE
            echo "<div class='formbox'>
            <input type='hidden' name='table' value='category'>
            <label for='name' class='form-label'>Nazwa kategorii:</label>
            <input type='text' name='name' class='form-control' required>
            <button type='submit' class='btn btn-primary'>Dodaj kategorię</button></div>";
        } ?>

    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>