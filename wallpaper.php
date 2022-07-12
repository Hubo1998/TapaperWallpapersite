<?php require(__DIR__ . "/functions/dbfirst.php");
$idtapeta = $_GET['id'];
$headdata=DBFirstArrayQuery("Select opis,nazwa from tapeta where idtapeta=$idtapeta")?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $headdata[0][0];?>"/>
    <link rel="stylesheet" href="css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="css/wallpaperstyle.css" type="text/css">
    <title><?php echo $headdata[0][1];?></title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <?php require __DIR__ . "/layout/header.php";
    $idtapeta = $_GET['id'];
    $data = DBArrayQuery("Select tapeta.nazwapliku,kategoria.nazwa,tapeta.nazwa,tapeta.datadodania,tapeta.opis from tapeta,kategoria where tapeta.kategoria_idkategoria=kategoria.idkategoria AND idtapeta=$idtapeta;");
    if(!isset($data[0][0])){
        header("Location: /index.php");
    }else{
        $tapeta = $data[0][0]; //ściezka do pliku z bazy
        $kategoria = $data[0][1]; //kategoria z bazy
        $nazwa = $data[0][2]; //nazwa z bazy
        $rozdzx = getimagesize("images/$tapeta")[0];
        $rozdzy = getimagesize("images/$tapeta")[1];
        $rozmiar = round(filesize("images/$tapeta") / 1024 / 1024, 3) . 'MB';
        $datadodania = $data[0][3]; //data dodania z bazy
        $opis = $data[0][4]; //opis z bazy
    }
    ?>
    <div class="wallpapercontainer">
        <div class="wallpaperbox">
        <?php echo "<img src='images/$tapeta' alt=''>
            <a href='/images/$tapeta' download='$tapeta' class='wallpaperbutton'>Pobierz</a>";?>
        </div>
        <div class="wallpaperdescriptionbox">
            <div class="description"><b>Kategoria</b>
                <p><?php echo $kategoria; ?></p>
            </div>
            <div class="description"><b>Tytuł</b>
                <p><?php echo $nazwa; ?></p>
            </div>
            <div class="description">
                <p><?php echo $rozdzx;
                    echo ' x ';
                    echo $rozdzy; ?>, <?php echo $rozmiar; ?>, <?php echo $datadodania; ?></p>
            </div>
            <div class="description">
                <p><?php echo $opis; ?></p>
            </div>
        </div>
    </div>


    <?php require __DIR__ . "/layout/footer.php"; ?>
</body>

</html>