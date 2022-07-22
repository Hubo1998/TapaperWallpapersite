<?php require(__DIR__ . "/functions/dbfirst.php");
require(__DIR__ . "/functions/functions.php");?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Serwis z darmowymi tapetami do pobrania na różnego rodzaju urządzenia"/>
    <meta name="keywords" content="tapeta, tapety"/>
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/homepagestyle.css" type="text/css">
    <title>Tapaper - Strona główna</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php require __DIR__ . "/layout/header.php"; ?>
    <div class="wallpapercontainerheader">Najnowsze tapety</div>
    <div class="wallpaperscontainer">
        <?php
        getHomePageWallpapers("dateadd");
        ?>
    </div>
    <div class="wallpapercontainerheader">Tapety o najlepszej rozdzielczości</div>
    <div class="wallpaperscontainer">
        <?php
        getHomePageWallpapers("filesize");
        ?>
    </div>

    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>