<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="../css/adminpanel.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/admin.ico">
    <title>Admin Panel</title>
</head>

<body>
    <?php require __DIR__ . "../../layout/header.php";
    if ($_SESSION['login'] != 'OK') {
        header("Location: /index.php");
    }
    if (isset($_GET['nazwa'])) {
        $nazwapliku = $_GET['nazwa'];
        $idtapeta = $_GET['id'];
        $datadodania = $_GET['data'];
        echo "<div class='text'>Edycja tapety o ID = $idtapeta, data dodania - $datadodania</div>";
    }elseif ($_GET['error'] == 'numeric') {
        echo "<div class='text'>Pola nie mogą zawierać samych liczb.</div>";
    }
    $kat=DBArrayQuery("Select idkategoria,nazwa from kategoria;");
    ?>
    
        <?php if (isset($_GET['nazwa'])) {
            //EDYCJA
            $data=DBArrayQuery("Select nazwa,opis,kategoria_idkategoria from tapeta where idtapeta=$idtapeta;");
            $nazwa=$data[0][0];
            $opis=$data[0][1];
            $idkategoria=$data[0][2];
            echo "
            <form action='tableadd.php' method='POST' enctype='multipart/form-data'>
            <img class='editimage' src='/images/$nazwapliku' alt=''>
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='tapeta'>
            <input type='hidden' name='id' value='$idtapeta'>
            <label for='kategorie'>Kategoria:</label>
            <select id='kategorie' name='kategorie'>";
            foreach($kat as $value){
                if($value[0]==$idkategoria){
                    echo "<option value='$value[0]' selected>$value[1]</option>";
                }else{
                    echo "<option value='$value[0]'>$value[1]</option>";
                }
            }
            echo "</select><br>
            <label for='nazwa'>Nazwa tapety:</label>
            <input type='text' name='nazwa' value='$nazwa'><br>
            <label for='opis'>Opis:</label>
            <textarea name='opis' id='opis' maxlength='250' rows='5' cols='25'>$opis</textarea><br>
            <input type='submit' value='Edytuj tapetę'>";
        } else {
            
            //DODAWANIE
            echo "
            <form action='upload.php' method='POST' enctype='multipart/form-data'>
            <label for='upload'>Dodaj tapetę</label><br>
            <input type='file' id='upload' name='upload' accept='image/png, image/jpeg, image/jpg' required><br>
            <label for='kategorie'>Wybierz kategorię:</label>
            <select id='kategorie' name='kategorie'>";
            foreach($kat as $value){
                echo "<option value='$value[0]'>$value[1]</option>";
            }
            echo "</select><br>
            <label for='nazwa'>Nazwa tapety:</label>
            <input type='text' id='nazwa' name='nazwa' required><br>
            <label for='opis'>Opis:</label>
            <textarea name='opis' id='opis' maxlength='250' rows='5' cols='25'></textarea><br>
            <input type='submit' value='Dodaj tapetę'>";
        } ?>
        
    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>