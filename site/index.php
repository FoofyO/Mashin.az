<?php
    require_once "db.php";
    require_once "api/getGuidMD5.php";
    session_start();
    $page = isset($_GET["page"]) ? $_GET["page"] : "main"; 

    if(isset($_GET["action"]) && $_GET["action"] == "logout") {
        session_unset();
        session_destroy();
        header('Location: ?page=login');
    }
    elseif(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $stmt = $connection->prepare("DELETE FROM `ad` WHERE id ='".$_GET['id']."'");
        $stmt->execute();
        header("Location: ?page=main");
    }


    switch($page) {
        case "search": $page = 'cars/'.$page; break;
        case "newad": $page = 'cars/'.$page; break;
        case "main": $page = 'cars/'.$page; break;
        case "detail": $page = 'cars/'.$page; break;
        case "login": $page = 'auth/'.$page; break;
        case "profile": $page = 'auth/'.$page; break;
        case "settings": $page = 'auth/'.$page; break;
        case "registration": $page = 'auth/'.$page; break;
        default: $page = '404'; break;
    }

    include "pages/layout/header.php";
    include "pages/".$page.".php";
    include "pages/layout/footer.php";
?>