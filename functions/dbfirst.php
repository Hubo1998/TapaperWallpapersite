<?php
session_start();
$user = 'gubabqczps_Hubo90';
$host = 'localhost';
$pass = 'bE6jmXu2V3@';
$db = "gubabqczps_Tapaper";
function DBFirstArrayQuery($query)
{
    global $link;
    if (!$link) die('Connection broken');
    else {
        $result = mysqli_query($link, $query);
        if ($result === false) {
            echo "<p>" . mysqli_error($link) . "</p>";
            //				die ("Query failed: [$query]");
        }
        $rows = mysqli_fetch_all($result, MYSQLI_NUM);
    }
    if ($rows == NULL) $rows = array();
    return $rows;
};

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) {
    echo "Using: $user, $host, $pass, $db";
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    //die();
    //echo '<meta http-equiv="refresh" content="0; url=error.php">';
}  //else echo "Connection OK!";