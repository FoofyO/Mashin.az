<?php 
    if(isset($_SESSION["user"])) header('Location: ?page=profile');
    
    require_once "db.php";
    $ok = true;
    $namePattern = "/([A-Z]|[Ç]|[Ə]|[Ğ]|[İ]|[Ö]|[Ş]|[Ü]){1}([a-z]|[ç]|[ə]|[ı]|[ğ]|[ö]|[ş]|[ü]){2,29}/";
    $phonePattern = "/[0](([1][0])|([5][0-1,5])|([7][0,7])|([9][9]))[0-9]{7}/";
    $passPattern = "/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}/";
    $errors = [];
    $name = $phone = '';

    if(isset($_POST["submit"])) {
      if(empty($_POST["name"])) { $errors[] = "* Adınızı daxil edin"; $ok = false; } 
      elseif(!preg_match($namePattern, $_POST["name"])) { $errors[] = "* Adınız minimum 3 hərfdən ibarət olmalıdır və böyük<br/> hərfnən başlamalıdır"; $ok = false; } 

      if(empty($_POST["phone"])) { $errors[] = "* Telefon nömrəsini daxil edin"; $ok = false; } 
      elseif(!preg_match($phonePattern, $_POST["phone"])) { $errors[] = "* Telefon nömrəsinin formatı səhvdir, Məsələn: 0501234567"; $ok = false; } 
      
      if(empty($_POST["city"])) { $errors[] = "* Şəhəri seçin"; $ok = false; } 
      
      if(empty($_POST["pass"])) { $errors[] = "* Şifrəni daxil edin"; $ok = false; } 
      elseif(!preg_match($passPattern, $_POST["pass"])) { 
        $errors[] = "* Şifrə çox asandır:<br/>
        minimum 1 kiçik hərf [a-z]<br/>
        minimum 1 böyük hərf [A-Z]<br/>
        uzunluğu minimum 6 simvol<br/>
        minimum 1 rəqəmli simvol [0-9]";
        $ok = false; 
      }

      if(empty($_POST["repass"])) { $errors[] = "* Təkrar şifrəni daxil edin"; $ok = false; } 

      if($ok) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $city = $_POST["city"];
        $password = $_POST["pass"];
        $repassword = $_POST["repass"];
        
        if($password == $repassword) {
          $stmt = $connection->prepare("SELECT * FROM `user` WHERE `phone`= '".$phone."'");
          $stmt->execute();
          $row = $stmt->fetch();
          
          if(!$row) {
            $stmt = $connection->prepare("INSERT INTO `user`(`name`, `phone`, `password`, `cityId`, `imageId`) VALUES ('".$name."', $phone,'".md5($password)."', $city, 1)");
            $stmt->execute();
            header("Location: ?page=login");
          } else $errors[] = "* Telefon nömrəsi artıq istifadə olunub";
        } else $errors[] = "* Şifrələr uyğun gəlmir";
      } else { $name = $_POST["name"]; $phone = $_POST["phone"]; }
    }
?>
<div class="auth-container">
    <form method="post" class="container">
        <div>
        <h1>Qeydiyyat</h1>
        <div class="errors">
            <?php foreach($errors as $i):?>
                <p class='error'><?=$i?></p>
            <?php endforeach; ?>
        </div>
        <hr>
        <div class="column-inputs">
            <input id="name" name="name" type="text" placeholder="Adınız" maxlength="30" value="<?=$name?>"/>
            <input id="phone" name="phone" type="text" placeholder="Telefon nömrəsi" maxlength="10" value="<?=$phone?>"/>
            <select id="city" name="city">
              <option value="" selected disabled>Şəhəri seçin:</option>
              <?php
                $stmt = $connection->prepare("SELECT * FROM `city`");
                $stmt->execute();
                while($row = $stmt->fetch()) echo "<option value='".$row['id']."'>".$row['name']."</option>";
              ?>
            </select>
            <input id="pass" name="pass" type="password" placeholder="Şifrə" maxlength="35"/>
            <input id="repass" name="repass" type="password" placeholder="Şifrəni təkrarlayın" maxlength="35"/>
            <input name="submit" type="submit" value="Keç"/>
        </div>
    </div>
    <div class="bottom">
        <p>Qeydiyyatdan keçmisiniz? <a href="?page=login">Daxil ol</a>.</p>
    </div>
  </form>
</div>