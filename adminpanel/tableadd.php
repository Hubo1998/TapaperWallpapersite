<?php
require __DIR__."../../functions/db.php";
$tabela=$_POST['table'];
$nazwa=$_POST['nazwa'];
$idwiersza=$_POST['id'];
$idtabela="id".$_POST['table'];
$opis=$_POST['opis'];
$idkategoria=$_POST['kategorie'];
$haslo=hash("sha256",$_POST['haslo']);
$rehaslo=hash("sha256",$_POST['rehaslo']);
if(!is_numeric($nazwa)){
    if($_POST['edit']=='true'){
        if($tabela=='kategoria'){
            $fnazwa=mb_convert_case($nazwa,MB_CASE_TITLE,"UTF-8");
            DBExecQuery("Update kategoria SET nazwa='$fnazwa' where $idtabela=$idwiersza");
            header("Location: /adminpanel/categorylist.php");
        }elseif($tabela=='admin'){
            DBExecQuery("Update admin SET login='$nazwa' where $idtabela=$idwiersza");
            header("Location: /adminpanel/userlist.php");
        }elseif($tabela=='tapeta'){
            DBExecQuery("Update tapeta SET nazwa='$nazwa',opis='$opis',kategoria_idkategoria='$idkategoria' where $idtabela=$idwiersza");
            header("Location: /adminpanel/wallpaperlist.php");
        }
    
    }else{
        if($tabela=='kategoria'){
            DBExecQuery("Insert INTO kategoria VALUES('null','$fnazwa',current_timestamp())");
            header("Location: /adminpanel/categorylist.php");
        }elseif($tabela=='admin'){
            if($haslo==$rehaslo){
                DBExecQuery("Insert INTO admin VALUES('null',current_timestamp(),'$nazwa','$haslo');");
                header("Location: /adminpanel/userlist.php");
            }else{
                header("Location: /adminpanel/useradd.php?error=password");
            }
        }
    }
}else{
    if($tabela=='kategoria'){
        header("Location: /adminpanel/categoryadd.php?error=numeric");
    }elseif($tabela=='admin'){
        header("Location: /adminpanel/useradd.php?error=numeric");
    }elseif($tabela=='tapeta'){
        header("Location: /adminpanel/wallpaperadd.php?error=numeric");
    }
}
