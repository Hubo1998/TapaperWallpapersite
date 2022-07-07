<?php 
require_once("database/startfile.php"); 
$tapeta; //ściezka do pliku z bazy
$kategoria=1; //kategoria z bazy
$nazwa=2;//nazwa z bazy
$rozdz=getimagesize($tapeta)[0]+' x '+getimagesize($tapeta)[1];
$rozmiar=round(filesize("images/beach1.jpg") / 1024 / 1024,4) . 'MB';
$data=5;//data dodania z bazy
$opis=6; //opis z bazy
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/wallpaperstyle.css" type="text/css">
    <title>Tapaper</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php require("layout/header.php") ?>
    <div class="wallpapercontainer">
        <div class="wallpaperbox">
            <img src="images/dahlia1.jpg" alt="">
            <button class="wallpaperbutton">Pobierz</button>
        </div>
        <div class="wallpaperdescriptionbox">
            <div class="description"><b>Kategoria</b><p>Numer 2</p></div>
            <div class="description"><b>Tytuł</b><p>Nazwa</p></div>
            <div class="description"><p>1920x1080, 1.45MB, 20.06.2020</p></div>
            <div class="description"><p>Opis</p></div>
        </div>
    </div>


    <?php require("layout/footer.php") ?>
</body>

</html>