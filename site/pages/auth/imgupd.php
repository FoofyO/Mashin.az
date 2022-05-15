<?php
    if(isset($_POST["submit"]) && $_FILES["photo"]["name"] != '') {
        $file = $_FILES["photo"];
        $path = "../../../../Coursework/site/resources/images/profiles/" . $file["name"];
        $ext = strtolower( pathinfo($path, PATHINFO_EXTENSION) );
        $check = getimagesize( $file["tmp_name"] );
        $ok = ($check == false || file_exists($path) || $file["size"] > 500000 || $ext != "jpg" && $ext != "png" && $ext != "jpeg") ? 0 : 1;

        if ($ok) {
            $fileName = GUID() .'.'. $ext;
            $path = "C:/xampp/htdocs/Coursework/site/resources/images/profiles/" . $fileName;
            move_uploaded_file($file["tmp_name"], $path);
            $stmt = $connection->prepare("INSERT INTO `profile_image` (`path`) VALUES ('/profiles/$fileName')");
            $stmt->execute();
            $lastId = $connection->lastInsertId();
            $stmt = $connection->prepare("UPDATE `user` SET `imageId`= '".$lastId."' WHERE `id` = '".$_SESSION['userId']."'");
            $stmt->execute();
        }
    }
?>
<form method="post" class="edit" enctype="multipart/form-data">
    <?php
        $stmt = $connection->prepare("SELECT * FROM `userinfo` WHERE `uid` = '".$_SESSION['userId']."'");
        $stmt->execute();    
        $row = $stmt->fetch();
    ?>
    <?php if($row) :?>
        <img src="../../../../Coursework/site/resources/images<?=$row['path']?>">
        <input name="photo" type="file" accept="image/*"/>
        <input name="submit" type="submit" value="Yeniləyin"/>
    <?php endif ?>
</form>