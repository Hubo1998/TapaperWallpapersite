<?php require(__DIR__ . "/functions/dbfirst.php");
require(__DIR__ . "/functions/functions.php");
$idcategory = $_GET['id'];
$categorywallpapers=getCategoryWallpapers($idcategory);
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
    <title>Tapaper - <?php echo $categorywallpapers[0][2];?></title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php 
    require __DIR__ . "/layout/header.php";
    ?>
    <div class="wallpapercontainerheader">
        <?php echo $categorywallpapers[0][2]; ?>
    </div>
    <div class="wallpaperscontainer">
        <?php
        showWallpapers($categorywallpapers);
        ?>
    </div>


    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>