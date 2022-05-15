<?php
    if(!isset($_SESSION["user"])) header('Location: ?page=login');
    
    $ok = true;
    $errors = [];
    $info = '';
    $year = $credit = $barter = $price = $price_type = $mileage = $mileage_type = $power = 0;
    $wheel = $abs = $luke = $rain = $closure = $radar = $conditioner = $heating = $salon = $xenon = $camera = $curtains = $ventilation = 0;

    $brand = isset($_POST["brand"]) ? $_POST["brand"] : '';
    $model = isset($_POST["model"]) ? $_POST["model"] : '';
    $body = isset($_POST["body"]) ? $_POST["body"] : '';
    $mileage = isset($_POST["mileage"]) ? $_POST["mileage"] : '';
    $mileage_type = isset($_POST["mileage_type"]) ? $_POST["mileage_type"] : 0;
    $color = isset($_POST["color"]) ? $_POST["color"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : '';
    $price_type = isset($_POST["brand"]) ? $_POST["price_type"] : 0;
    $fuel = isset($_POST["fuel"]) ? $_POST["fuel"] : '';
    $drive = isset($_POST["drive"]) ? $_POST["drive"] : '';
    $gearbox = isset($_POST["gearbox"]) ? $_POST["gearbox"] : '';
    $year = isset($_POST["year"]) ? $_POST["year"] : '';
    $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : '';
    $power = isset($_POST["power"]) ? $_POST["power"] : '';

    $credit = isset($_POST["credit"]) ? 1 : 0;
    $barter = isset($_POST["barter"]) ? 1 : 0;
    
    $info = isset($_POST["info"]) ? $_POST["info"] : '';
    
    $wheel = isset($_POST["wheel"]) ? 1 : 0;
    $abs = isset($_POST["abs"]) ? 1 : 0;
    $luke = isset($_POST["luke"]) ? 1 : 0;
    $rain = isset($_POST["rain"]) ? 1 : 0;
    $closure = isset($_POST["closure"]) ? 1 : 0;
    $radar = isset($_POST["radar"]) ? 1 : 0;
    $conditioner = isset($_POST["conditioner"]) ? 1 : 0;
    $heating = isset($_POST["heating"]) ? 1 : 0;
    $salon = isset($_POST["salon"]) ? 1 : 0;
    $xenon = isset($_POST["xenon"]) ? 1 : 0;
    $camera = isset($_POST["camera"]) ? 1 : 0;
    $curtains = isset($_POST["curtains"]) ? 1 : 0;
    $ventilation = isset($_POST["ventilation"]) ? 1 : 0;

    if(isset($_POST["submit"])) {
        if(empty($brand)) { $errors[] = "* Markani seçin"; $ok = false; } 
        if(empty($model)) { $errors[] = "* Modeli seçin"; $ok = false; } 
        if(empty($body)) { $errors[] = "* Ban növünü seçin"; $ok = false; } 
        if(empty($mileage)) { $errors[] = "* Yürüşü daxil edin"; $ok = false; } 
        if(empty($color)) { $errors[] = "* Rəngi seçin"; $ok = false; } 
        if(empty($price)) { $errors[] = "* Qiyməti daxil edin"; $ok = false; } 
        if(empty($fuel)) { $errors[] = "* Yanacaq növünü seçin"; $ok = false; } 
        if(empty($drive)) { $errors[] = "* Ötürücü seçin"; $ok = false; } 
        if(empty($gearbox)) { $errors[] = "* Sürət qutusunu seçin"; $ok = false; } 
        
        if(empty($capacity)) { $errors[] = "* Mühərrikin həcmini seçin"; $ok = false; } 
        if(empty($power)) { $errors[] = "* Mühərrikin gücünü seçin"; $ok = false; } 
        
        if(count($_FILES["photo"]["name"]) < 3) { $errors[] = "* Minimum – 3 şəkil olmalıdır"; $ok = false; } 
        elseif (count($_FILES["photo"]["name"]) > 21) { $errors[] = "* Maximum – 21 şəkil olmalıdır"; $ok = false; } 
        
        if($ok) {
            $stmt = $connection->prepare("INSERT INTO `ad` 
            (`brandId`, `modelId`, `bodyId`, 
            `mileage`, `mileageType`, `colorId`, 
            `price`, `priceType`, `fuelId`, `driveId`, 
            `gearboxId`, `year`, `capacityId`, `power`, 
            `credit`, `barter`, `info`, `wheel`, `abs`, 
            `luke`, `rain`, `closure`, `radar`, `conditioner`, 
            `heating`, `salon`, `xenon`, `camera`, `curtains`, `ventilation`, `userId`) 
            VALUES ('".$brand."', '".$model."', '".$body."', '".$mileage."', '".$mileage_type."',
            '".$color."', '".$price."', '".$price_type."', '".$fuel."', '".$drive."', '".$gearbox."',
            '".$year."', '".$capacity."', '".$power."', '".$credit."', '".$barter."',
            '".$info."', '".$wheel."', '".$abs."', '".$luke."',
            '".$rain."', '".$closure."', '".$radar."', '".$conditioner."', '".$heating."',
            '".$salon."', '".$xenon."', '".$camera."', '".$curtains."', '".$ventilation."', '".$_SESSION['userId']."')");
            $stmt->execute();
            $lastId = $connection->lastInsertId();
            
            for ($i= 0; $i < count($_FILES["photo"]["name"]); $i++) { 
                $file = $_FILES["photo"];
                $path = "../../../../Coursework/site/resources/images/cars/" . $file["name"][$i];
                $ext = strtolower( pathinfo($path, PATHINFO_EXTENSION) );
                $check = getimagesize( $file["tmp_name"][$i] );
                $ok = ($check == false || file_exists($path) || $file["size"][$i] > 500000 || $ext != "jpg" && $ext != "png" && $ext != "jpeg") ? 0 : 1;

                if ($ok) {
                    $fileName = GUID() .'.'. $ext;
                    $path = "C:/xampp/htdocs/Coursework/site/resources/images/cars/" . $fileName;
                    move_uploaded_file($file["tmp_name"][$i], $path);
                    $stmt = $connection->prepare("INSERT INTO `car_image` (`path`, `adId`) VALUES ('/cars/$fileName', $lastId)");
                    $stmt->execute();
                    header('Location: ?page=main');
                }
            }
        }
    }
?>
<div class="newad-container">
    <form method="POST" class="container" enctype="multipart/form-data">
        <h1>Elan yerləşdirmək</h1>
        <div class="errors">
            <div class="errors-grid">
                <?php foreach($errors as $i):?>
                    <p class='error'><?=$i?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="left">
                <div class="product">
                    <label>Marka <abbr>*</abbr></label>
                    <select id="brand" name="brand">
                        <?php
                            echo "<option ".($row['id'] == $brand ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `brand`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $brand ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Model <abbr>*</abbr></label>
                    <select id="model" name="model">
                        <?php 
                            if($brand != '') {
                                echo "<option ".($model == '' ? 'selected' : '')." value=''>Seçin:</option>";
                                $stmt = $connection->prepare("SELECT * FROM `model` WHERE `brandId` = $brand");
                                $stmt->execute();
                                while($row = $stmt->fetch()) echo "<option ".($row['id'] == $model ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                            } else echo "<option value='' disabled selected>Model</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Ban növü <abbr>*</abbr></label>
                    <select id="body" name="body">
                        <?php
                            echo "<option ".($row['id'] == $body ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `body_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $body ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Yürüş <abbr>*</abbr></label>
                    <input name="mileage" type="number" min="0" value="<?=$mileage?>"/>
                    <div class="measure">
                        <label><input type="radio" id="km" name="mileage_type" value="0" <?= $mileage_type == 0 ? 'checked' : ''?>/> km</label>
                        <label><input type="radio" id="mi" name="mileage_type" value="1" <?= $mileage_type == 1 ? 'checked' : ''?>/> mi</label>
                    </div>
                </div>
                <div class="product">
                    <label>Rəng <abbr>*</abbr></label>
                    <select id="color" name="color">
                        <?php
                            echo "<option ".($row['id'] == $color ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `color`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $color ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Qiymət <abbr>*</abbr></label>
                    <input name="price" type="number" min="500" value="<?=$price?>"/>
                    <div class="measure">
                        <label><input type="radio" id="azn" name="price_type" value="0" <?= $price_type == 0 ? 'checked' : ''?>/> AZN</label>
                        <label><input type="radio" id="usd" name="price_type" value="1" <?= $price_type == 1 ? 'checked' : ''?>/> USD</label>
                        <label><input type="radio" id="eur" name="price_type" value="2" <?= $price_type == 2 ? 'checked' : ''?>/> EUR</label>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="product">
                    <label>Yanacaq növü <abbr>*</abbr></label>
                    <select id="fuel" name="fuel">
                        <?php
                            echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `fuel_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>Ötürücü <abbr>*</abbr></label>
                    <select id="drive" name="drive">
                        <?php
                            echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `drive_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>Sürətlər qutusu <abbr>*</abbr></label>
                    <select id="gearbox" name="gearbox">
                        <?php
                            echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `gearbox`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>Buraxılış ili <abbr>*</abbr></label>
                    <input id="year" name="year" type="number" min="1902" max="<?=date('Y')?>" value="<?=$year?>"/>
                </div> 
                <div class="product">
                    <label>Mühərrikin həcmi, sm3 <abbr>*</abbr></label>
                    <select id="capacity" name="capacity">
                        <?php
                            echo "<option ".($row['id'] == $capacity ? 'selected' : '')." value='' selected>Seçin:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `engine_capacity`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='".$row['id']."'>".$row['value']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Mühərrikin gücü, a.g. <abbr>*</abbr></label>
                    <input id="power" name="power" type="number" min="1" value="<?=$power?>"/>
                </div> 
            </div>
        </div>
        <div class="optional">
            <div class="option"><label><input type="checkbox" id="credit" name="credit" <?= $credit == 0 ? '' : 'checked'?> /> Kreditdədir</label></div>
            <div class="option"><label><input type="checkbox" id="barter" name="barter" <?= $barter == 0 ? '' : 'checked'?>/> Barter mümkündür</label></div>
        </div>
        <div class="text-area">
            <label>Əlavə məlumat</label>
            <textarea name="info" maxlength="1900" ><?=$info?></textarea>
        </div>
        <div class="options">     
            <h2>Avtomobilin təchizatı</h2>
            <div class="auto-options">
                <label><input type="checkbox" id="wheel" name="wheel" <?= $wheel == 0 ? '' : 'checked'?>/> Yüngül lehimli disklər</label>
                <label><input type="checkbox" id="abs" name="abs" <?= $abs == 0 ? '' : 'checked'?>/> ABS</label>
                <label><input type="checkbox" id="luke" name="luke" <?= $luke == 0 ? '' : 'checked'?>/> Lyuk</label>
                <label><input type="checkbox" id="rain" name="rain" <?= $rain == 0 ? '' : 'checked'?>/> Yağış sensoru</label>
                <label><input type="checkbox" id="closure" name="closure" <?= $closure == 0 ? '' : 'checked'?>/> Mərkəzi qapanma</label>
                <label><input type="checkbox" id="radar" name="radar" <?= $radar == 0 ? '' : 'checked'?>/> Park radarı</label>
                <label><input type="checkbox" id="conditioner" name="conditioner" <?= $conditioner == 0 ? '' : 'checked'?>/> Kondisioner</label>
                <label><input type="checkbox" id="heating" name="heating" <?= $heating == 0 ? '' : 'checked'?>/> Oturacaqların isidilməsi</label>
                <label><input type="checkbox" id="salon" name="salon" <?= $salon == 0 ? '' : 'checked'?>/> Dəri salon</label>
                <label><input type="checkbox" id="xenon" name="xenon" <?= $xenon == 0 ? '' : 'checked'?>/> Ksenon lampalar</label>
                <label><input type="checkbox" id="camera" name="camera" <?= $camera == 0 ? '' : 'checked'?>/> Arxa görüntü kamerası</label>
                <label><input type="checkbox" id="curtains" name="curtains" <?= $curtains == 0 ? '' : 'checked'?>/> Yan pərdələr</label>
                <label><input type="checkbox" id="ventilation" name="ventilation" <?= $ventilation == 0 ? '' : 'checked'?>/> Oturacaqların ventilyasiyası</label>
            </div>
        </div>
        <div class="images">
            <h2>Şəkillər</h2>
            <div class="auto-images">
                <div class="info">
                    <ul>
                        <li>Minimum – 3 şəkil (ön, arxa və bütöv ön panelin görüntüsü mütləqdir).</li>
                        <li>Maksimum – 21 şəkil.</li>
                        <li>Optimal ölçü – 1024x768 piksel.</li>
                    </ul>
                </div>
                <div id="upload" class="upload">
                    <input id="photo" name="photo[]" type="file" accept=".png, .jpg, .jpeg" multiple>
                </div>
            </div>
            <ul class="after">
                <li>Şəkillər Azərbaycan Respublikasının ərazisində çəkilməlidir.</li>
                <li>Şəkillər yaxşı keyfiyyətdə olmalıdır.Nəqliyyat vasitəsi yaxşı işıqlandırılmış olmalı, şəkillərin üzərində loqotip və digər yazılar olmamalıdır. Skrinşotlar qəbul olunmur.</li>
            </ul>
        </div>
        <div class="central"><input name="submit" type="submit" value="Davam et"/></div>
        <div class="terms">
            <p>Elan yerləşdirərək, siz Maşin.az-ın <a href="#">İstifadəçi razılaşması</a> və <a href="#">Qaydaları</a> ilə razı olduğunuzu təsdiq edirsiniz</p>
        </div>
    </form>
</div>