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
    echo <<<HEAD1
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data dodania</th>
    HEAD1;
    if ($table == "admin") {
        echo "<th>Nazwa użytkownika</th>";
    } elseif ($table == "category") {
        echo "<th>Nazwa kategorii</th>";
    } else {
        echo "<th>Nazwa pliku</th>";
    }
    echo <<<HEAD2
                <th>Edycja</th>
                <th>Usuwanie</th>
            </tr>
        </thead>
        <tbody>
    HEAD2;
    foreach ($data as $value) {
        echo <<<BODY1
            <tr>
                <td>$value[0]</td>
                <td>$value[1]</td>
                <td>$value[2]</td>
            BODY1;
        if ($table == "admin") {
            echo "<td><a href='useradd.php?id=$value[0]&date=$value[1]&name=$value[2]'>Edytuj</a></td>";
        }elseif($table =="category"){
            echo "<td><a href='categoryadd.php?id=$value[0]&date=$value[1]&name=$value[2]'>Edytuj</a></td>";
        }elseif($table=="wallpaper"){
            echo "<td><a href='wallpaperadd.php?id=$value[0]&date=$value[1]&name=$value[2]'>Edytuj</a></td>";
        }

        echo <<<BODY2
                <td><a href='tabledel.php?id=$value[0]&table=$table'>Usuń</a></td>
            </tr>
            BODY2;
    };
    echo "</tbody>";
    echo "</table>";
}




/**
 * Prepares, executes and shows first 8 ordered wallpapers just in one line
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


/**
 * Returns data(w.filename,w.idwallpaper,c.name) with all wallpapers of category
 * 
 * @param int $idcategory
 * Id of category we want to select from database
 */
function getCategoryWallpapers($idcategory)
{
    $stmt = DBQuery("Select wallpaper.filename,wallpaper.idwallpaper,category.name from wallpaper,category where category_idcategory=:idcategory AND category.idcategory=:idcategory;");
    $stmt->bindParam(':idcategory', $idcategory);
    $categorywallpapers = Execute($stmt);
    return $categorywallpapers;
}

/**
 * Returns all data about categories
 */
function getCategories()
{
    $stmt = DBQuery("Select * from category;");
    $data = Execute($stmt);
    return $data;
}

/**
 * Returns data(w.filename,c.name,w.name,w.dateadd,w.description) with all wallpapers informations needed to show it
 * 
 * @param int $idwallpaper
 * Id of wallpaper we want to select from database
 */
function getWallpaper($idwallpaper)
{
    $stmt = DBQuery("Select wallpaper.filename,category.name,wallpaper.name,wallpaper.dateadd,wallpaper.description from wallpaper,category where wallpaper.category_idcategory=category.idcategory AND idwallpaper=:idwallpaper;");
    $stmt->bindParam(':idwallpaper', $idwallpaper);
    $data = Execute($stmt);
    return $data;
}

/**
 * Checks if we want to get wallpaper table otherwise selects all from table, then shows table with data
 * 
 * @param string $table
 * Name of table we want to get list with data from
 */
function getList($table)
{
    if ($table == "wallpaper") {
        $stmt = DBQuery("Select idwallpaper,dateadd,filename from wallpaper;");
    } else {
        $stmt = DBQuery("Select * from $table;");
    }
    $data = Execute($stmt);
    showTable($data, $table);
}
