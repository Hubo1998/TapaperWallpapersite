<?php 
require_once("database/startfile.php"); 
$idkategoria=$_GET['id'];
$nazwakategorii=DBArrayQuery("Select kategoria.nazwa from kategoria where kategoria.idkategoria=$idkategoria;");
$tapetykategorii=DBArrayQuery("Select tapeta.nazwapliku from tapeta where kategoria_idkategoria=$idkategoria;");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/homepagestyle.css" type="text/css">
    <title>Tapaper</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php require("layout/header.php") ?>
    <div class="wallpapercontainerheader">
        <?php echo $nazwakategorii[0][0];?>
    </div>
    <div class="wallpaperscontainer">
        <?php
        foreach($tapetykategorii as $value){
            echo "
            <div class='wallpaperbox'>
                <a href='wallpaper.php'>
                    <img src='images/$value[0]' alt='' class='wallpaper'>
                </a>
            </div>";
        }
        ?>
    </div>


    <?php require("layout/footer.php") ?>
</body>

</html>