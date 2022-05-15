<?php
    require_once '../db.php';
    $id = isset($_GET["aid"]) ? $_GET["aid"] : 0;
    $imgs = $connection->prepare("SELECT * FROM `car_image` WHERE `adId` = '".$id."' ORDER BY 'id' LIMIT 1");
    $imgs->execute();
    $imgsRes = $imgs->fetch();
    print(json_encode($imgsRes)); 
?>