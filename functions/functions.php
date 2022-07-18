<?php
function showWallpapers($data){
    foreach ($data as $value) {
        echo "
            <div class='wallpaperbox'>
                <a href='wallpaper.php?id=$value[1]'>
                    <img src='images/$value[0]' alt='' class='wallpaper'>
                </a>
            </div>";
    }
}
function showTable($data,$table){
    echo <<<HEAD
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data dodania</th>
                <th>Nazwa pliku</th>
                <th>Edycja</th>
                <th>Usuwanie</th>
            </tr>
        </thead>
        <tbody>
    HEAD;
        foreach($data as $value){
            echo <<<BODY
            <tr>
                <td>$value[0]</td>
                <td>$value[1]</td>
                <td>$value[2]</td>
                <td><a href='wallpaperadd.php?id=$value[0]&data=$value[1]&nazwa=$value[2]'>Edytuj</a></td>
                <td><a href='tabledel.php?id=$value[0]&table=$table'>Usuń</a></td>
            </tr>
            BODY;
        echo "</tbody>";
    echo "</table>";
        };
}