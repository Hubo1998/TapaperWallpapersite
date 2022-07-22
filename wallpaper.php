<?php require(__DIR__ . "/functions/dbfirst.php");
require(__DIR__ . "/functions/functions.php");
$idwallpaper = $_GET['id'];
$wallpaperdata=getWallpaper($idwallpaper); ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $wallpaperdata[0][4]; ?>" />
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/wallpaperstyle.css" type="text/css">
    <title><?php echo $wallpaperdata[0][2]; ?></title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php require __DIR__ . "/layout/header.php";
    if (!isset($wallpaperdata[0][0])) {
        header("Location: /index.php");
    } else {
        $wallpaper = $wallpaperdata[0][0]; //ściezka do pliku z bazy
        $category = $wallpaperdata[0][1]; //kategoria z bazy
        $name = $wallpaperdata[0][2]; //nazwa z bazy
        $resx = getimagesize("images/$wallpaper")[0];
        $resy = getimagesize("images/$wallpaper")[1];
        $size = round(filesize("images/$wallpaper") / 1024 / 1024, 3) . 'MB';
        $releasedate = $wallpaperdata[0][3]; //wallpaperdata dodania z bazy
        $description = $wallpaperdata[0][4]; //opis z bazy
    }
    ?>
    <div class="wallpapercontainer">
        <div class="wallpaperbox">
            <?php echo "<img src='images/$wallpaper' alt=''>
            <a href='/images/$wallpaper' download='$wallpaper' class='wallpaperbutton'>Pobierz</a>"; ?>
        </div>
        <div class="wallpaperdescriptionbox">
            <div class="description"><b>Kategoria</b>
                <p><?php echo $category; ?></p>
            </div>
            <div class="description"><b>Tytuł</b>
                <p><?php echo $name; ?></p>
            </div>
            <div class="description">
                <p><?php echo $resx;
                    echo ' x ';
                    echo $resy; ?>, <?php echo $size; ?>, <?php echo $releasedate; ?></p>
            </div>
            <div class="description">
                <p><?php echo $description; ?></p>
            </div>
        </div>
    </div>


    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>