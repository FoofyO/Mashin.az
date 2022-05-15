<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "maşınaz";

    try {
        $connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    } catch(PDOException $ex) {
        die(
            "<div style='display: flex; justify-content: center;'>
                <h2 style='font-family: sans-serif;'>Connection failed: " . $ex->getMessage() . "</h2>
            </div>"
        );
    }
?>