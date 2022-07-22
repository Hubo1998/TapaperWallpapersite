<?php
require __DIR__ . "../../functions/dbfirst.php";
$table = $_POST['table'];
$name = $_POST['name'];
$idrow = $_POST['id'];
$description = $_POST['description'];
$idcategory = $_POST['categories'];
$password = hash("sha256", $_POST['password']);
$repassword = hash("sha256", $_POST['repassword']);
$finalname = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
$releasedate = $_POST['date'];
if (!is_numeric($name)) {
    if ($_POST['edit'] == 'true') {
        if ($table == 'category') {
            $var = 0;
            $st = DBQuery("Select name from category");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
                if ($value['name'] == $textfromform) {
                    $var += 1;
                }
            }
            if ($var == 0) {
                $stmt = DBQuery("Update category SET name=:fname where idcategory=:idrow");
                $stmt->bindParam(":fname", $finalname);
                $stmt->bindParam(":idrow", $idrow);
                $stmt->execute();
                header("Location: /adminpanel/categorylist.php");
            } else {
                header("Location: /adminpanel/categoryadd.php?error=name&id=$idrow&data=$releasedate&name=$name");
            }
        } elseif ($table == 'admin') {
            $st = DBQuery("Select login from admin");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_UPPER, "UTF-8");
                $textfromdb = mb_convert_case($value['login'], MB_CASE_UPPER, "UTF-8");
                if ($textfromdb == $textfromform) {
                    header("Location: /adminpanel/useradd.php?error=login&name=$name&data=$releasedate&id=$idrow");
                }
            }
            $stmt = DBQuery("Update admin SET login=:name where idadmin=:idrow");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":idrow", $idrow);
            $stmt->execute();
            header("Location: /adminpanel/userlist.php");
        } elseif ($table == 'wallpaper') {
            $stmt = DBQuery("Update wallpaper SET name=:name,description=:description,category_idcategory=:idcategory where idwallpaper=:idrow");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":idcategory", $idcategory);
            $stmt->bindParam(":idrow", $idrow);
            $stmt->execute();
            header("Location: /adminpanel/wallpaperlist.php");
        }
    } else {
        if ($table == 'category') {
            $var = 0;
            $st = DBQuery("Select name from category");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
                if ($value['name'] == $textfromform) {
                    $var += 1;
                }
            }
            if ($var == 0) {
                $stmt = DBQuery("Insert INTO category VALUES(null,:fname,current_timestamp())");
                $stmt->bindParam(":fname", $finalname);
                $stmt->execute();
                header("Location: /adminpanel/categorylist.php");
            } else {
                header("Location: /adminpanel/categoryadd.php?error=name");
            }
        } elseif ($table == 'admin') {
            if ($password == $repassword) {
                $st = DBQuery("Select login from admin");
                $d = Execute($st);
                foreach ($d as $value) {
                    $textfromform = mb_convert_case($name, MB_CASE_UPPER, "UTF-8");
                    $textfromdb = mb_convert_case($value['login'], MB_CASE_UPPER, "UTF-8");
                    if ($textfromdb == $textfromform) {
                        header("Location: /adminpanel/useradd.php?error=login");
                    }
                }
                $stmt = DBQuery("Insert INTO admin VALUES(null,current_timestamp(),:name,:password);");
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":password", $password);
                $stmt->execute();
                header("Location: /adminpanel/userlist.php");
            } else {
                header("Location: /adminpanel/useradd.php?error=password");
            }
        }
    }
} else {
    if ($table == 'category') {
        header("Location: /adminpanel/categoryadd.php?error=numeric");
    } elseif ($table == 'admin') {
        header("Location: /adminpanel/useradd.php?error=numeric");
    } elseif ($table == 'wallpaper') {
        header("Location: /adminpanel/wallpaperadd.php?error=numeric");
    }
}
