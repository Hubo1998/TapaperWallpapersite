<?php
$name = $_POST['nazwa'];
$description = $_POST['opis'];
$idcategory = $_POST['kategorie'];
require __DIR__ . "../../functions/dbfirst.php";
if (is_uploaded_file($_FILES['upload']['tmp_name'])) {

    $uploadwallpaper = $_FILES['upload']['name'];

    if (strlen($uploadwallpaper) > 100) {
        header("Location: /adminpanel/wallpaperadd.php?error=len");
    }
    $uploadwallpaper = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $uploadwallpaper);

    if ($_FILES['upload']['size'] > 20000000) {
        header("Location: /adminpanel/wallpaperadd.php?error=size");
    }
    $st = DBQuery("Select nazwa from tapeta");
    $d = Execute($st);
    foreach ($d as $value) {
        $textfromform = mb_convert_case($name, MB_CASE_UPPER, "UTF-8");
        $textfromdb = mb_convert_case($value['nazwa'], MB_CASE_UPPER, "UTF-8");
        if ($textfromdb == $textfromform) {
            header("Location: /adminpanel/wallpaperadd.php?error=name");
        }
    }
    $d = __DIR__ . '../../images/' . $uploadwallpaper;
    $size = $_FILES['upload']['size'];
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $d)) {
        $stmt = DBQuery("Insert into tapeta values('null',:nazwa,:opis,current_timestamp(),:idkategoria,:uploadwallpaper,:size)");
        $stmt->bindParam(":nazwa", $name);
        $stmt->bindParam(":opis", $description);
        $stmt->bindParam(":idkategoria", $idcategory);
        $stmt->bindParam(":uploadwallpaper", $uploadwallpaper);
        $stmt->bindParam(":size", $size);
        $stmt->execute();
        header("Location: wallpaperlist.php");
    }
}
