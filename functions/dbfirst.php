<?php
session_start();
$user = 'gubabqczps_Hubo90';
$host = 'localhost';
$pass = 'bE6jmXu2V3@';
$db = "gubabqczps_Tapaper";

function DBQuery($sql)
{
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        if($stmt){
            return $stmt;
        }else {
            echo "Błąd zapytania";
        }
    } catch (PDOException $e) {
        echo "Wystąpił błąd z pobieraniem danych:" . $e->getMessage();
    }
}
function Execute($st)
{
    try {
        $result = $st->execute();
        if ($result) {
            $data = $st->fetchAll();
        } else {
            $error = $st->errorInfo();
            echo "Błąd zapytania:" . $error[2];
        }
    } catch (PDOException $e) {
        echo "Wystąpił błąd z pobieraniem danych:" . $e->getMessage();
    }
    return $data;
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
