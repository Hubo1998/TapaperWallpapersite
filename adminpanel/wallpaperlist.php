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
    } ?>
    <a href="wallpaperadd.php" class="addbutton">Dodaj nową tapetę</a>
    <?php
    $data=DBArrayQuery("Select idtapeta,datadodania,nazwapliku from tapeta;");
    ?>
    <table>
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