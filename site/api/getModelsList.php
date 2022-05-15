<?php
    require_once '../db.php';
    $id = isset($_GET["id"]) ? $_GET["id"] : 1;
    $stmt = $connection->prepare("SELECT * FROM `model` WHERE `brandId`= $id ORDER BY `name`");
    $stmt->execute();
    $arr = [];
    while($row = $stmt->fetch()) {
        $arr[] = $row;
    }
    print(json_encode($arr)); 
?>