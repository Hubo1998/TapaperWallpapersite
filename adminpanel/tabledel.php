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
    $id = $_GET['id'];
    $table = $_GET['table'];
    if ($_GET['del'] == 'true') {
        if ($table == 'category') {
            $st = DBQuery("Select * from wallpaper where category_idcategory=:id;");
            $st->bindParam(":id", $id);
            $d = Execute($st);
            if (count($d[0]) == 0) {
                $stmt = DBQuery("Delete from category where idcategory=:id;");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                header("Location: /adminpanel/categorylist.php");
            }else{
                echo "<div class='text'>W kategorii nie mogą znajdować się żadne zdjęcia.</div>";
            }
        } elseif ($table == 'admin') {
            $stmt = DBQuery("Delete from admin where idadmin=:id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location: /adminpanel/userlist.php");
        } elseif ($table == 'wallpaper') {
            $stmt = DBQuery("Delete from wallpaper where idwallpaper=:id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            header("Location: /adminpanel/wallpaperlist.php");
        }
    }
    if ($table == 'category') {
        $stmt = DBQuery("Select * from category where idcategory=:id;");
        $stmt->bindParam(":id", $id);
        $data = Execute($stmt);
    } elseif ($table == 'admin') {
        $stmt = DBQuery("Select * from admin where idadmin=:id;");
        $stmt->bindParam(":id", $id);
        $data = Execute($stmt);
    } elseif ($table == 'wallpaper') {
        $stmt = DBQuery("Select * from wallpaper where idwallpaper=:id;");
        $stmt->bindParam(":id", $id);
        $data = Execute($stmt);
    }
    echo "<div class='text'>Czy napewno chcesz usunąć rekord:</div>";
    ?>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data dodania</th>
                <th>Nazwa</th>
                <?php if ($table == 'admin') {
                    echo "<th>Hasło</th>";
                } elseif ($table == 'wallpaper') {
                    echo "
                    <th>Data dodania</th>
                    <th>Kategoria</th>
                    <th>Nazwa pliku</th>
                    <th>Wielkość w bajtach</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php for ($i = 0; $i < count($data[0]) / 2; $i++) {
                    $text = $data[0][$i];
                    echo "<td>$text</td>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <div class="confirmcontainer">
        <?php echo "<a class='confirm' href='tabledel.php?id=$id&table=$table&del=true'>Usuń</a>"; ?>
        <a class="confirm" href="/index.php">Anuluj</a>
    </div>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>