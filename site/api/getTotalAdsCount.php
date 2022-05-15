<?php 
    require_once '../db.php';
    $query = isset($_SESSION["userId"]) ? 'WHERE `userId` != "'.$_SESSION['userId'].'"' : '';
    $stmt = $connection->prepare("SELECT * FROM `adinfo` $query");
    $stmt->execute();
    print(json_encode($totalItems = $stmt->rowCount()));
?>