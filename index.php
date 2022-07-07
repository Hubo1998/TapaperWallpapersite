<?php require_once("database/startfile.php"); ?>
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
        Najnowsze tapety
    </div>
    <div class="wallpaperscontainer">
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/dahlia1.jpg" alt="" class="wallpaper">
            </a>
        </div>
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/beach1.jpg" alt="" class="wallpaper">
            </a>

        </div>
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/dahlia1.jpg" alt="" class="wallpaper">
            </a>

        </div>
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/beach1.jpg" alt="" class="wallpaper">
            </a>

        </div>
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/beach1.jpg" alt="" class="wallpaper">
            </a>

        </div>

    </div>
    <div class="wallpapercontainerheader">
        Tapety o najlepszej rozdzielczości
    </div>
    <div class="wallpaperscontainer">
        <div class="wallpaperbox">
            <a href="wallpaper.php">
                <img src="images/beach1.jpg" alt="" class="wallpaper">
            </a>
        </div>

    </div>

    <?php require("layout/footer.php") ?>
</body>

</html>