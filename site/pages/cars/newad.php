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
        if(empty($brand)) { $errors[] = "* Markani se??in"; $ok = false; } 
        if(empty($model)) { $errors[] = "* Modeli se??in"; $ok = false; } 
        if(empty($body)) { $errors[] = "* Ban n??v??n?? se??in"; $ok = false; } 
        if(empty($mileage)) { $errors[] = "* Y??r?????? daxil edin"; $ok = false; } 
        if(empty($color)) { $errors[] = "* R??ngi se??in"; $ok = false; } 
        if(empty($price)) { $errors[] = "* Qiym??ti daxil edin"; $ok = false; } 
        if(empty($fuel)) { $errors[] = "* Yanacaq n??v??n?? se??in"; $ok = false; } 
        if(empty($drive)) { $errors[] = "* ??t??r??c?? se??in"; $ok = false; } 
        if(empty($gearbox)) { $errors[] = "* S??r??t qutusunu se??in"; $ok = false; } 
        
        if(empty($capacity)) { $errors[] = "* M??h??rrikin h??cmini se??in"; $ok = false; } 
        if(empty($power)) { $errors[] = "* M??h??rrikin g??c??n?? se??in"; $ok = false; } 
        
        if(count($_FILES["photo"]["name"]) < 3) { $errors[] = "* Minimum ??? 3 ????kil olmal??d??r"; $ok = false; } 
        elseif (count($_FILES["photo"]["name"]) > 21) { $errors[] = "* Maximum ??? 21 ????kil olmal??d??r"; $ok = false; } 
        
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
        <h1>Elan yerl????dirm??k</h1>
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
                            echo "<option ".($row['id'] == $brand ? 'selected' : '')." value='' selected>Se??in:</option>";
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
                                echo "<option ".($model == '' ? 'selected' : '')." value=''>Se??in:</option>";
                                $stmt = $connection->prepare("SELECT * FROM `model` WHERE `brandId` = $brand");
                                $stmt->execute();
                                while($row = $stmt->fetch()) echo "<option ".($row['id'] == $model ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                            } else echo "<option value='' disabled selected>Model</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Ban n??v?? <abbr>*</abbr></label>
                    <select id="body" name="body">
                        <?php
                            echo "<option ".($row['id'] == $body ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `body_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $body ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Y??r???? <abbr>*</abbr></label>
                    <input name="mileage" type="number" min="0" value="<?=$mileage?>"/>
                    <div class="measure">
                        <label><input type="radio" id="km" name="mileage_type" value="0" <?= $mileage_type == 0 ? 'checked' : ''?>/> km</label>
                        <label><input type="radio" id="mi" name="mileage_type" value="1" <?= $mileage_type == 1 ? 'checked' : ''?>/> mi</label>
                    </div>
                </div>
                <div class="product">
                    <label>R??ng <abbr>*</abbr></label>
                    <select id="color" name="color">
                        <?php
                            echo "<option ".($row['id'] == $color ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `color`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $color ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>Qiym??t <abbr>*</abbr></label>
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
                    <label>Yanacaq n??v?? <abbr>*</abbr></label>
                    <select id="fuel" name="fuel">
                        <?php
                            echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `fuel_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>??t??r??c?? <abbr>*</abbr></label>
                    <select id="drive" name="drive">
                        <?php
                            echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `drive_type`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>S??r??tl??r qutusu <abbr>*</abbr></label>
                    <select id="gearbox" name="gearbox">
                        <?php
                            echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `gearbox`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                        ?>
                    </select>
                </div> 
                <div class="product">
                    <label>Burax??l???? ili <abbr>*</abbr></label>
                    <input id="year" name="year" type="number" min="1902" max="<?=date('Y')?>" value="<?=$year?>"/>
                </div> 
                <div class="product">
                    <label>M??h??rrikin h??cmi, sm3 <abbr>*</abbr></label>
                    <select id="capacity" name="capacity">
                        <?php
                            echo "<option ".($row['id'] == $capacity ? 'selected' : '')." value='' selected>Se??in:</option>";
                            $stmt = $connection->prepare("SELECT * FROM `engine_capacity`");
                            $stmt->execute();
                            while($row = $stmt->fetch()) echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='".$row['id']."'>".$row['value']."</option>";
                        ?>
                    </select>
                </div>
                <div class="product">
                    <label>M??h??rrikin g??c??, a.g. <abbr>*</abbr></label>
                    <input id="power" name="power" type="number" min="1" value="<?=$power?>"/>
                </div> 
            </div>
        </div>
        <div class="optional">
            <div class="option"><label><input type="checkbox" id="credit" name="credit" <?= $credit == 0 ? '' : 'checked'?> /> Kreditd??dir</label></div>
            <div class="option"><label><input type="checkbox" id="barter" name="barter" <?= $barter == 0 ? '' : 'checked'?>/> Barter m??mk??nd??r</label></div>
        </div>
        <div class="text-area">
            <label>??lav?? m??lumat</label>
            <textarea name="info" maxlength="1900" ><?=$info?></textarea>
        </div>
        <div class="options">     
            <h2>Avtomobilin t??chizat??</h2>
            <div class="auto-options">
                <label><input type="checkbox" id="wheel" name="wheel" <?= $wheel == 0 ? '' : 'checked'?>/> Y??ng??l lehimli diskl??r</label>
                <label><input type="checkbox" id="abs" name="abs" <?= $abs == 0 ? '' : 'checked'?>/> ABS</label>
                <label><input type="checkbox" id="luke" name="luke" <?= $luke == 0 ? '' : 'checked'?>/> Lyuk</label>
                <label><input type="checkbox" id="rain" name="rain" <?= $rain == 0 ? '' : 'checked'?>/> Ya?????? sensoru</label>
                <label><input type="checkbox" id="closure" name="closure" <?= $closure == 0 ? '' : 'checked'?>/> M??rk??zi qapanma</label>
                <label><input type="checkbox" id="radar" name="radar" <?= $radar == 0 ? '' : 'checked'?>/> Park radar??</label>
                <label><input type="checkbox" id="conditioner" name="conditioner" <?= $conditioner == 0 ? '' : 'checked'?>/> Kondisioner</label>
                <label><input type="checkbox" id="heating" name="heating" <?= $heating == 0 ? '' : 'checked'?>/> Oturacaqlar??n isidilm??si</label>
                <label><input type="checkbox" id="salon" name="salon" <?= $salon == 0 ? '' : 'checked'?>/> D??ri salon</label>
                <label><input type="checkbox" id="xenon" name="xenon" <?= $xenon == 0 ? '' : 'checked'?>/> Ksenon lampalar</label>
                <label><input type="checkbox" id="camera" name="camera" <?= $camera == 0 ? '' : 'checked'?>/> Arxa g??r??nt?? kameras??</label>
                <label><input type="checkbox" id="curtains" name="curtains" <?= $curtains == 0 ? '' : 'checked'?>/> Yan p??rd??l??r</label>
                <label><input type="checkbox" id="ventilation" name="ventilation" <?= $ventilation == 0 ? '' : 'checked'?>/> Oturacaqlar??n ventilyasiyas??</label>
            </div>
        </div>
        <div class="images">
            <h2>????kill??r</h2>
            <div class="auto-images">
                <div class="info">
                    <ul>
                        <li>Minimum ??? 3 ????kil (??n, arxa v?? b??t??v ??n panelin g??r??nt??s?? m??tl??qdir).</li>
                        <li>Maksimum ??? 21 ????kil.</li>
                        <li>Optimal ??l???? ??? 1024x768 piksel.</li>
                    </ul>
                </div>
                <div id="upload" class="upload">
                    <input id="photo" name="photo[]" type="file" accept=".png, .jpg, .jpeg" multiple>
                </div>
            </div>
            <ul class="after">
                <li>????kill??r Az??rbaycan Respublikas??n??n ??razisind?? ????kilm??lidir.</li>
                <li>????kill??r yax???? keyfiyy??td?? olmal??d??r.N??qliyyat vasit??si yax???? i????qland??r??lm???? olmal??, ????kill??rin ??z??rind?? loqotip v?? dig??r yaz??lar olmamal??d??r. Skrin??otlar q??bul olunmur.</li>
            </ul>
        </div>
        <div class="central"><input name="submit" type="submit" value="Davam et"/></div>
        <div class="terms">
            <p>Elan yerl????dir??r??k, siz Ma??in.az-??n <a href="#">??stifad????i raz??la??mas??</a> v?? <a href="#">Qaydalar??</a> il?? raz?? oldu??unuzu t??sdiq edirsiniz</p>
        </div>
    </form>
</div>