<?php
$nazwa=$_POST['nazwa'];
$opis=$_POST['opis'];
$idkategoria=$_POST['kategorie'];
require __DIR__."../../functions/db.php";
if (is_uploaded_file($_FILES['upload']['tmp_name'])) {

    $uploadwallpaper = $_FILES['upload']['name'];
    
    if (strlen($uploadwallpaper) > 100) {
        echo "Za długa nazwa pliku";
        exit;
    }
    $uploadwallpaper = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $uploadwallpaper);

    if ($_FILES['upload']['size'] > 20000000) {
        echo "Za duży plik";
        exit;
    }

    $d = __DIR__ . '../../images/' . $uploadwallpaper;
    $size=$_FILES['upload']['size'];
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $d)) {
        DBExecQuery("Insert into tapeta values('null','$nazwa','$opis',current_timestamp(),'$idkategoria','$uploadwallpaper','$size')");
        header("Location: wallpaperlist.php");
    }
}
