<?php
require __DIR__ . "../../functions/dbfirst.php";
$table = $_POST['table'];
$name = $_POST['nazwa'];
$idrow = $_POST['id'];
$description = $_POST['opis'];
$idcategory = $_POST['kategorie'];
$password = hash("sha256", $_POST['haslo']);
$repassword = hash("sha256", $_POST['rehaslo']);
$finalname = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
$releasedate = $_POST['date'];
if (!is_numeric($name)) {
    if ($_POST['edit'] == 'true') {
        if ($table == 'kategoria') {
            $var = 0;
            $st = DBQuery("Select nazwa from kategoria");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
                if ($value['nazwa'] == $textfromform) {
                    $var += 1;
                }
            }
            if ($var == 0) {
                $stmt = DBQuery("Update kategoria SET nazwa=:fnazwa where idkategoria=:idwiersza");
                $stmt->bindParam(":fnazwa", $finalname);
                $stmt->bindParam(":idwiersza", $idrow);
                $stmt->execute();
                header("Location: /adminpanel/categorylist.php");
            } else {
                header("Location: /adminpanel/categoryadd.php?error=name&id=$idrow&data=$releasedate&nazwa=$name");
            }
        } elseif ($table == 'admin') {
            $st = DBQuery("Select login from admin");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_UPPER, "UTF-8");
                $textfromdb = mb_convert_case($value['login'], MB_CASE_UPPER, "UTF-8");
                if ($textfromdb == $textfromform) {
                    header("Location: /adminpanel/useradd.php?error=login&nazwa=$name&data=$releasedate&id=$idrow");
                }
            }
            $stmt = DBQuery("Update admin SET login=:nazwa where idadmin=:idwiersza");
            $stmt->bindParam(":nazwa", $name);
            $stmt->bindParam(":idwiersza", $idrow);
            $stmt->execute();
            header("Location: /adminpanel/userlist.php");
        } elseif ($table == 'tapeta') {
            $stmt = DBQuery("Update tapeta SET nazwa=:nazwa,opis=:opis,kategoria_idkategoria=:idkategoria where idtapeta=:idwiersza");
            $stmt->bindParam(":nazwa", $name);
            $stmt->bindParam(":opis", $description);
            $stmt->bindParam(":idkategoria", $idcategory);
            $stmt->bindParam(":idwiersza", $idrow);
            $stmt->execute();
            header("Location: /adminpanel/wallpaperlist.php");
        }
    } else {
        if ($table == 'kategoria') {
            $var = 0;
            $st = DBQuery("Select nazwa from kategoria");
            $d = Execute($st);
            foreach ($d as $value) {
                $textfromform = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
                if ($value['nazwa'] == $textfromform) {
                    $var += 1;
                }
            }
            if ($var == 0) {
                $stmt = DBQuery("Insert INTO kategoria VALUES('null',:fname,current_timestamp())");
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
                $stmt = DBQuery("Insert INTO admin VALUES('null',current_timestamp(),:nazwa,:haslo);");
                $stmt->bindParam(":nazwa", $name);
                $stmt->bindParam(":haslo", $password);
                $stmt->execute();
                header("Location: /adminpanel/userlist.php");
            } else {
                header("Location: /adminpanel/useradd.php?error=password");
            }
        }
    }
} else {
    if ($table == 'kategoria') {
        header("Location: /adminpanel/categoryadd.php?error=numeric");
    } elseif ($table == 'admin') {
        header("Location: /adminpanel/useradd.php?error=numeric");
    } elseif ($table == 'tapeta') {
        header("Location: /adminpanel/wallpaperadd.php?error=numeric");
    }
}
