<?php require(__DIR__ . "/functions/dbfirst.php");
$idkategoria = $_GET['id'];
$stmt=DBQuery("Select nazwa from kategoria where idkategoria=:idkategoria");
$stmt->bindParam(':idkategoria',$idkategoria);
$headdata=Execute($stmt);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Strona kategorii, wyświetla wszystkie zdjęcia z danej kategorii."/>
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/homepagestyle.css" type="text/css">
    <title>Tapaper - <?php echo $headdata[0][0];?></title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php 
    require __DIR__ . "/layout/header.php";
    $stmt2 = DBQuery("Select tapeta.nazwapliku,idtapeta from tapeta where kategoria_idkategoria=:idkategoria;"); 
    $stmt2->bindParam(':idkategoria',$idkategoria);
    $tapetykategorii=Execute($stmt2);
    ?>
    <div class="wallpapercontainerheader">
        <?php echo $headdata[0][0]; ?>
    </div>
    <div class="wallpaperscontainer">
        <?php
        foreach ($tapetykategorii as $value) {
            echo "
            <div class='wallpaperbox'>
                <a href='wallpaper.php?id=$value[1]'>
                    <img src='images/$value[0]' alt='' class='wallpaper'>
                </a>
            </div>";
        }
        ?>
    </div>


    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>