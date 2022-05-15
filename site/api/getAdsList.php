<?php
    require_once '../db.php';
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $query = isset($_SESSION["userId"]) ? 'WHERE `userId` != "'.$_SESSION['userId'].'"' : '';
    $stmt = $connection->prepare("SELECT * FROM `adinfo` $query ORDER BY `date` DESC LIMIT ".(($page - 1) * 16).", ".($page * 16)."");
    $stmt->execute();
    $arr = [];
    while($row = $stmt->fetch()) {
        $arr[] = $row;
    }
    print(json_encode($arr)); 
?>