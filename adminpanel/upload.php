<?php
require __DIR__ . "../../functions/dbfirst.php";
require(__DIR__ . "../../functions/functions.php");
$name = $_POST['name'];
$description = $_POST['description'];
$idcategory = $_POST['categories'];
echo $_FILES['upload']['tmp_name'];
if (is_uploaded_file($_FILES['upload']['tmp_name'])) {
    $uploadwallpaper = $_FILES['upload']['name'];

    if (strlen($uploadwallpaper) > 100) {
        header("Location: /adminpanel/wallpaperadd.php?error=len");
    }
    $uploadwallpaper = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $uploadwallpaper);

    if ($_FILES['upload']['size'] > 20000000) {
        header("Location: /adminpanel/wallpaperadd.php?error=size");
    }
    $st = DBQuery("Select name from wallpaper");
    $d = Execute($st);
    foreach ($d as $value) {
        $textfromform = mb_convert_case($name, MB_CASE_UPPER, "UTF-8");
        $textfromdb = mb_convert_case($value['name'], MB_CASE_UPPER, "UTF-8");
        if ($textfromdb == $textfromform) {
            header("Location: /adminpanel/wallpaperadd.php?error=name");
        }
    }
    $d = __DIR__ . '../../images/' . $uploadwallpaper;
    $size = $_FILES['upload']['size'];
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $d)) {
        $stmt = DBQuery("Insert into wallpaper values(null,:name,:description,current_timestamp(),:idcategory,:uploadwallpaper,:size)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":idcategory", $idcategory);
        $stmt->bindParam(":uploadwallpaper", $uploadwallpaper);
        $stmt->bindParam(":size", $size);
        $stmt->execute();
        header("Location: wallpaperlist.php");
    }
}
