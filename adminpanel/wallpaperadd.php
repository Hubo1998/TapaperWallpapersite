<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/headerfooterstyle.css" type="text/css">
    <link rel="stylesheet" href="../css/adminpanel.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="/images/admin.ico">
    <title>Admin Panel</title>
</head>

<body>
    <?php require __DIR__ . "../../functions/dbfirst.php";
    require __DIR__ . "../../layout/header.php";
    if ($_SESSION['login'] != 'OK') {
        header("Location: /index.php");
    }
    if (isset($_GET['nazwa'])) {
        $filename = $_GET['nazwa'];
        $idwallpaper = $_GET['id'];
        $releasedate = $_GET['data'];
        echo "<div class='text'>Edycja tapety o ID = $idwallpaper, data dodania - $releasedate</div>";
    }elseif ($_GET['error'] == 'numeric') {
        echo "<div class='text'>Pola nie mogą zawierać samych liczb.</div>";
    }elseif ($_GET['error'] == 'name') {
        echo "<div class='text'>Tapeta o takiej nazwie już istnieje.</div>";
    }elseif ($_GET['error'] == 'size') {
        echo "<div class='text'>Plik jest zbyt duży.</div>";
    }elseif ($_GET['error'] == 'len') {
        echo "<div class='text'>Nazwa pliku jest zbyt długa.</div>";
    }
    $stmt=DBQuery("Select idkategoria,nazwa from kategoria;");
    $cat=Execute($stmt);
    ?>
    
        <?php if (isset($_GET['nazwa'])) {
            //EDYCJA
            $stmt2=DBQuery("Select nazwa,opis,kategoria_idkategoria from tapeta where idtapeta=:idtapeta;");
            $stmt2->bindParam(':idtapeta',$idwallpaper);
            $data=Execute($stmt2);
            $name=$data[0][0];
            $description=$data[0][1];
            $categoryid=$data[0][2];
            echo "<div class='formbox'>
            <form action='tableadd.php' method='POST' enctype='multipart/form-data'>
            <img class='editimage' src='/images/$filename' alt=''>
            <input type='hidden' name='edit' value='true'>
            <input type='hidden' name='table' value='tapeta'>
            <input type='hidden' name='id' value='$idwallpaper'>
            <label for='kategorie' class='form-label'>Kategoria:</label>
            <select id='kategorie' name='kategorie' class='form-control'>";
            foreach($cat as $value){
                if($value[0]==$categoryid){
                    echo "<option value='$value[0]' selected>$value[1]</option>";
                }else{
                    echo "<option value='$value[0]'>$value[1]</option>";
                }
            }
            echo "</select><br>
            <label for='nazwa' class='form-label'>Nazwa tapety:</label>
            <input type='text' name='nazwa' value='$name' class='form-control'><br>
            <label for='opis' class='form-label'>Opis:</label>
            <textarea name='opis' id='opis' maxlength='250' rows='5' cols='25' class='form-control'>$description</textarea><br>
            <button type='submit' class='btn btn-primary'>Edytuj tapetę</button></div>";
        } else {
            
            //DODAWANIE
            echo "<div class='formbox'>
            <form action='upload.php' method='POST' enctype='multipart/form-data'>
            <label for='upload' class='form-label'>Dodaj tapetę:</label><br>
            <input type='file' id='upload' name='upload' accept='image/png, image/jpeg, image/jpg' class='form-label-file' required><br>
            <label for='kategorie' class='form-label'>Wybierz kategorię:</label>
            <select id='kategorie' name='kategorie' class='form-control'>";
            foreach($cat as $value){
                echo "<option value='$value[0]'>$value[1]</option>";
            }
            echo "</select><br>
            <label for='nazwa' class='form-label'>Nazwa tapety:</label>
            <input type='text' id='nazwa' name='nazwa' required class='form-control'><br>
            <label for='opis' class='form-label'>Opis:</label>
            <textarea name='opis' id='opis' maxlength='250' rows='5' cols='25' class='form-control'></textarea><br>
            <button type='submit' class='btn btn-primary'>Dodaj tapetę</button></div>";
        } ?>
        
    </form>
    <?php require __DIR__ . "../../layout/footer.php"; ?>
</body>

</html>