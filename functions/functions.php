<?php

/**
 * Showing all of wallpapers packed in 2 dim-array containing filenames and id of images
 * 
 * @param array $data
 * This is executed and fetched data from database
 */

function showWallpapers($data)
{
    foreach ($data as $value) {
        echo "
            <div class='wallpaperbox'>
                <a href='wallpaper.php?id=$value[1]'>
                    <img src='images/$value[0]' alt='' class='wallpaper'>
                </a>
            </div>";
    }
}



/**
 * Showing all rows of table we want with same headers
 * 
 * @param array $data
 * This is executed and fetched data from database
 * 
 * @param string $table
 * Name of table which we want to show
 */
function showTable($data, $table)
{
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
    foreach ($data as $value) {
        echo <<<BODY
            <tr>
                <td>$value[0]</td>
                <td>$value[1]</td>
                <td>$value[2]</td>
                <td><a href='wallpaperadd.php?id=$value[0]&date=$value[1]&name=$value[2]'>Edytuj</a></td>
                <td><a href='tabledel.php?id=$value[0]&table=$table'>Usuń</a></td>
            </tr>
            BODY;
    };
    echo "</tbody>";
    echo "</table>";
}




/**
 * Preparing, executing and showing first 8 ordered wallpapers just in one line
 * 
 * @param string $orderby
 * This is name of column we want to order by our wallpapers
 */
function getHomePageWallpapers($orderby)
{
    $stmt = DBQuery("Select filename,idwallpaper From wallpaper ORDER BY $orderby DESC LIMIT 8");
    $data = Execute($stmt);
    showWallpapers($data);
}
