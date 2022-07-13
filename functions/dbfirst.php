<?php
session_start();
$user = 'gubabqczps_Hubo90';
$host = 'localhost';
$pass = 'bE6jmXu2V3@';
$db = "gubabqczps_Tapaper";

function DBQuery($sql){
    global $conn;
    $stmt=$conn->prepare($sql);
    return $stmt;
}
function Execute($st){
    $st->execute();
    $data=$st->fetchAll();
    return $data;
}

try{
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
