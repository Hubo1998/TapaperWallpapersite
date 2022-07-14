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
    } ?>
    <a href="wallpaperadd.php" class="addbutton">Dodaj nową tapetę</a>
    <?php
    $stmt=DBQuery("Select idtapeta,datadodania,nazwapliku from tapeta;");
    $data=Execute($stmt);
    ?>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data dodania</th>
                <th>Nazwa pliku</th>
                <th>Edycja</th>
                <th>Usuwanie</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($data as $value){
                echo "
                <tr>
                    <td>$value[0]</td>
                    <td>$value[1]</td>
                    <td>$value[2]</td>
                    <td><a href='wallpaperadd.php?id=$value[0]&data=$value[1]&nazwa=$value[2]'>Edytuj</a></td>
                    <td><a href='tabledel.php?id=$value[0]&table=tapeta'>Usuń</a></td>
                </tr>";
            };
            ?>
        </tbody>
    </table>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>