<?php 
    if(isset($_SESSION["user"])) header('Location: ?page=profile');
    require_once "db.php";
    $ok = true;
    $login = '';
    $errors = [];

    if(isset($_POST["submit"])) {
        if(empty($_POST["text"])) { $errors[] = "* E-poçt və ya telefon nömrəsini daxil edin"; $ok = false; } 
        if(empty($_POST["pass"])) { $errors[] = "* Şifrəni daxil edin"; $ok = false; } 

        if($ok) {
            $text = $_POST["text"];
            $password = $_POST["pass"];
            
            $stmt = $connection->prepare("SELECT * FROM `user` WHERE `password`='".md5($password)."' AND (`phone`= '".$text."' OR `email` = '".$text."')");
            $stmt->execute();
            $row = $stmt->fetch();
            if($row) {
                $_SESSION["userId"] = $row["id"];
                $_SESSION["user"] = $row["phone"];
                header('Location: ?page=main');
            } else { $login = $_POST["text"]; $errors[] = "Yanlış e-poçt və ya telefon nömrəsi"; }
        }
    }
?>
<div class="auth-container">
    <form method="post" class="container">
        <div>
            <h1>Giriş</h1>
            <div class="errors">
                <?php foreach($errors as $i):?>
                    <p class='error'><?=$i?></p>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="column-inputs">
                <input id="text" name="text" type="text" placeholder="E-poçt və ya telefon nömrəsi" maxlength="100" value="<?=$login?>">
                <input id="pass" name="pass" type="password" placeholder="Şifrə" maxlength="35">
                <input name="submit" type="submit" value="Daxil ol"/>
            </div>
        </div>
        <div class="bottom">
            <p>Yeni hesab yarat, <a href="?page=registration">Qeydiyyatdan keç</a>.</p>
        </div>
    </form>
</div>
