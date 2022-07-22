<?php require(__DIR__ . "/functions/dbfirst.php");
require(__DIR__ . "/functions/functions.php");
$idcategory = $_GET['id'];
$stmt=DBQuery("Select nazwa from category where idcategory=:idcategory");
$stmt->bindParam(':idcategory',$idcategory);
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
    $stmt2 = DBQuery("Select wallpaper.filename,idwallpaper from wallpaper where category_idcategory=:idcategory;"); 
    $stmt2->bindParam(':idcategory',$idcategory);
    $categorieswallpapers=Execute($stmt2);
    ?>
    <div class="wallpapercontainerheader">
        <?php echo $headdata[0][0]; ?>
    </div>
    <div class="wallpaperscontainer">
        <?php
        showWallpapers($categorieswallpapers);
        ?>
    </div>


    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>