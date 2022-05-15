<?php 
    if(!isset($_SESSION["user"])) header('Location: ?page=login');
    $namePattern = "/[A-Z][a-z]{2,29}/";
    $emailPattern = "/[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/";
    $phonePattern = "/[0](([1][0])|([5][0-1,5])|([7][0,7])|([9][9]))[0-9]{7}/";
    $ok = true;
    $errors = [];

    if(isset($_POST["submit"])) {
        if(empty($_POST["name"])) { $errors[] = "* Adınızı daxil edin"; $ok = false; } 
        elseif(!preg_match($namePattern, $_POST["name"])) { $errors[] = "* Adınız minimum 3 hərfdən ibarət olmalıdır və böyük<br/> hərfnən başlamalıdır"; $ok = false; } 

        if(empty($_POST["phone"])) { $errors[] = "* Telefon nömrəsini daxil edin"; $ok = false; } 
        elseif(!preg_match($phonePattern, $_POST["phone"])) { $errors[] = "* Telefon nömrəsi səhvdir, Məsələn: 0501234567"; $ok = false; } 
        
        if(empty($_POST["email"])) {}
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { $errors[] = "* E-poçt səhvdir, Məsələn: test@gmail.com"; $ok = false; } 
  
        if($ok) {
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $city = $_POST["city"];
          
            $stmt = $connection->prepare("SELECT * FROM `user` WHERE `phone` = $phone");
            $stmt->execute();
            $row = $stmt->fetch();
            
            if($row && $row['id'] != $_SESSION['userId']) { $errors[] = "* Telefon nömrəsi artıq istifadə olunub"; $ok = false; }
            if(!empty($email)) {
                $stmt = $connection->prepare("SELECT * FROM `user` WHERE `email` = '".$email."'");
                $stmt->execute();
                $row = $stmt->fetch();
                if($row && $row['id'] != $_SESSION['userId']) { $errors[] = "* E-poçt artıq istifadə olunub"; $ok = false; }
            }

            if($ok) {
                $stmt = $connection->prepare("UPDATE `user` SET `name` = '".$name."', `phone` = $phone, `email` = ".(empty($email) == 1 ? 'NULL' : "'$email'").", `cityId` = '".$city."' WHERE `id`='".$_SESSION['userId']."'");
                $stmt->execute();
                header("Location: ?page=settings");
            }
        }
    }
?>
<form method="post" class="edit">
    <?php
        $stmt = $connection->prepare("SELECT * FROM `userinfo` WHERE `uid` = '".$_SESSION['userId']."'");
        $stmt->execute();    
        $row = $stmt->fetch();
    ?>
    <?php if($row) :?>
        <div class="errors">
            <?php foreach($errors as $i):?>
                <p class='error'><?=$i?></p>
            <?php endforeach; ?>
        </div>
        <input id="name" name="name" type="text" placeholder="Adınız" maxlength="30" value="<?=$row['name']?>"/>
        <input id="phone" name="phone" type="text" placeholder="Telefon nömrəsi" maxlength="10" value="0<?=$row['phone']?>"/>
        <input id="email" name="email" type="text" placeholder="E-poçt" maxlength="100" value="<?=$row['email']?>"/>
        <select id="city" name="city">
            <option value="<?=$row['cid']?>" selected><?=$row['city']?></option>
            <?php
                $stmt = $connection->prepare("SELECT * FROM `city` WHERE `status` = 1");
                $stmt->execute();
                while($result = $stmt->fetch()) {
                    if($row['city'] != $result['name']) echo "<option value='".$result['id']."'>".$result['name']."</option>";
                }
            ?>
        </select>
    <?php endif ?>
    <input name="submit" type="submit" value="Yeniləyin"/>
</form>