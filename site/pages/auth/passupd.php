<?php 
    if(!isset($_SESSION["user"])) header('Location: ?page=login');
    $passPattern = "/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}/";
    $ok = true;
    $errors = [];

    if(isset($_POST["submit"])) {
        if(empty($_POST["old"])) { $errors[] = "* Köhnə şifrəni daxil edin"; $ok = false; } 
        
        if(empty($_POST["new"])) { $errors[] = "* Yeni şifrəni daxil edin"; $ok = false; } 
        elseif(!preg_match($passPattern, $_POST["new"])) { 
          $errors[] = "* Şifrə çox asandır:<br/>
          minimum 1 kiçik hərf [a-z]<br/>
          minimum 1 böyük hərf [A-Z]<br/>
          uzunluğu minimum 6 simvol<br/>
          minimum 1 rəqəmli simvol [0-9]";
          $ok = false; 
        }
  
        if(empty($_POST["renew"])) { $errors[] = "* Təkrar şifrəni daxil edin"; $ok = false; } 
  
        if($ok) {
          $old = $_POST["old"];
          $new = $_POST["new"];
          $renew = $_POST["renew"];
          
          if($new == $renew) {
            $stmt = $connection->prepare("SELECT * FROM `user` WHERE `id`= '".$_SESSION['userId']."' AND `password`= '".md5($old)."'");
            $stmt->execute();
            $row = $stmt->fetch();
            
            if($row) {
              $stmt = $connection->prepare("UPDATE `user` SET `password` = '".md5($new)."' WHERE `id`= '".$_SESSION['userId']."'");
              $stmt->execute();
              header("Location: ?page=settings");
            } else $errors[] = "* Köhnə şifrə etibarlı deyil";
          } else $errors[] = "* Şifrələr uyğun gəlmir";
        }
    }
?>
<form method="post" class="edit">
    <div class="errors">
        <?php foreach($errors as $i):?>
            <p class='error'><?=$i?></p>
        <?php endforeach; ?>
    </div>
    <input id="old" name="old" type="password" placeholder="Köhnə şifrə"/>
    <input id="new" name="new" type="password" placeholder="Yeni şifrə"/>
    <input id="renew" name="renew" type="password" placeholder="Şifrəni təkrarlayın"/>
    <input name="submit" type="submit" value="Yeniləyin"/>
</form>