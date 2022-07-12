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
    $id=$_GET['id'];
    $tabela=$_GET['table'];
    $idtabela="id".$_GET['table'];
    if($_GET['del']=='true'){
        DBExecQuery("Delete from $tabela where $idtabela=$id;");
        if($tabela=='kategoria'){
            header("Location: /adminpanel/categorylist.php");
        }elseif($tabela=='admin'){
            header("Location: /adminpanel/userlist.php");
        }elseif($tabela=='tapeta'){
            header("Location: /adminpanel/wallpaperlist.php");
        }
    }
    $data=DBArrayQuery("Select * from $tabela where $idtabela=$id;");
    echo "<div class='text'>Czy napewno chcesz usunąć rekord:</div>";
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data dodania</th>
                <th>Nazwa</th>
                <?php if($tabela=='admin'){
                    echo "<th>Hasło</th>";
                }elseif($tabela=='tapeta'){
                    echo "
                    <th>Data dodania</th>
                    <th>Kategoria</th>
                    <th>Nazwa pliku</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php for($i=0;$i<count($data[0]);$i++){
                    $text=$data[0][$i];
                    echo "<td>$text</td>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <div class="confirmcontainer">
        <?php echo "<a class='confirm' href='tabledel.php?id=$id&table=$tabela&del=true'>Usuń</a>";?>
        <a class="confirm" href="/index.php">Anuluj</a>
    </div>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>