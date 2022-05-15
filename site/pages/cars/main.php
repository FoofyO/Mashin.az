<?php
    $brand = isset($_GET["sbrand"]) ? $_GET["sbrand"] : '';
    $model = isset($_GET["smodel"]) ? $_GET["smodel"] : '';
    $body = isset($_GET["body"]) ? $_GET["body"] : '';
    $fuel = isset($_GET["fuel"]) ? $_GET["fuel"] : '';
    $drive = isset($_GET["drive"]) ? $_GET["drive"] : '';
    $color = isset($_GET["color"]) ? $_GET["color"] : '';
    $gearbox = isset($_GET["gearbox"]) ? $_GET["gearbox"] : '';

    $mileageMin = isset($_GET["mileageMin"]) ? $_GET["mileageMin"] : '';
    $mileageMax = isset($_GET["mileageMax"]) ? $_GET["mileageMax"] : '';
    $yearMin = isset($_GET["yearMin"]) ? $_GET["yearMin"] : '';
    $yearMax = isset($_GET["yearMax"]) ? $_GET["yearMax"] : '';

    $priceMin = isset($_GET["priceMin"]) ? $_GET["priceMin"] : '';
    $priceMax = isset($_GET["priceMax"]) ? $_GET["priceMax"] : '';
    $priceType = isset($_GET["priceType"]) ? $_GET["priceType"] : 0;
    
?>
<div class="main-container">
    <form class="search" method="get">
        <div class="row">
            <select id="sbrand" name="sbrand">
                <?php
                    echo "<option ".($row['id'] == $brand ? 'selected' : '')." value='' selected>Marka</option>";
                    $stmt = $connection->prepare("SELECT * FROM `brand`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $brand ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
            <select id="smodel" name="smodel">
                <?php 
                    if($brand != '') {
                        echo "<option ".($model == '' ? 'selected' : '')." value=''> Model</option>";
                        $stmt = $connection->prepare("SELECT * FROM `model` WHERE `brandId` = $brand");
                        $stmt->execute();
                        while($row = $stmt->fetch()) echo "<option ".($row['id'] == $model ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                    } else echo "<option value='' disabled selected>Model</option>";
                ?>
            </select>
            <select id="body" name="body">
                <?php
                    echo "<option ".($row['id'] == $body ? 'selected' : '')." value='' selected>Ban növü</option>";
                    $stmt = $connection->prepare("SELECT * FROM `body_type`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $body ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
            <select id="fuel" name="fuel">
                <?php
                    echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='' selected>Yanacaq növü</option>";
                    $stmt = $connection->prepare("SELECT * FROM `fuel_type`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $fuel ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
            <select id="drive" name="drive">
                <?php
                    echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='' selected>Ötürücü</option>";
                    $stmt = $connection->prepare("SELECT * FROM `drive_type`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $drive ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
        </div>
        <div class="row">
            <select id="color" name="color">
                <?php
                    echo "<option ".($row['id'] == $color ? 'selected' : '')." value='' selected>Rəng</option>";
                    $stmt = $connection->prepare("SELECT * FROM `color`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $color ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
            <select id="gearbox" name="gearbox">
                <?php
                    echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='' selected>Sürətlər qutusu</option>";
                    $stmt = $connection->prepare("SELECT * FROM `gearbox`");
                    $stmt->execute();
                    while($row = $stmt->fetch()) echo "<option ".($row['id'] == $gearbox ? 'selected' : '')." value='".$row['id']."'>".$row['name']."</option>";
                ?>
            </select>
            <input id="mileageMin" name="mileageMin" type="number" placeholder="Yürüş (km), min." min="0" value="<?=$mileageMin?>"/>
            <input id="mileageMax" name="mileageMax" type="number" placeholder="maks." min="0" value="<?=$mileageMax?>"/>
            <input id="yearMin" name="yearMin" type="number" placeholder="Il, min." min="1992" max="<?=date('Y')?>" value="<?=$yearMin?>"/>
            <input id="yearMax" name="yearMax" type="number" placeholder="maks." min="1992" max="<?=date('Y')?>" value="<?=$yearMax?>"/>
        </div>
        <div class="row space">
            <div>
                <input id="priceMin" name="priceMin" type="number" placeholder="Qiymət, min." min="500" value="<?=$priceMin?>"/>
                <input id="priceMax" name="priceMax" type="number" placeholder="maks." min="500" value="<?=$priceMax?>"/>
                <select id="priceType" name="priceType" class="priceType">
                    <option value="0" <?=$priceType == 0 ? 'selected' : ''?>>AZN</option>
                    <option value="1" <?=$priceType == 1 ? 'selected' : ''?>>USD</option>
                    <option value="2" <?=$priceType == 2 ? 'selected' : ''?>>EUR</option>
                </select>
            </div>
            <input id="search" name="search" type="submit" value="Elanları göstər"/>
        </div>
    </form>
    <?php if(isset($_GET['search'])):?>
        <?php 
            $query1 = empty($brand) ? '' : 'AND `brandId` = '.$brand.'';
            $query2 = empty($model) ? '' : 'AND `modelId` = '.$model.'';
            $query3 = empty($body) ? '' : 'AND `bodyId` = '.$body.'';
            $query4 = empty($fuel) ? '' : 'AND `fuelId` = '.$fuel.'';
            $query5 = empty($drive) ? '' : 'AND `driveId` = '.$drive.'';
            $query6 = empty($color) ? '' : 'AND `colorId` = '.$color.'';
            $query7 = empty($gearbox) ? '' : 'AND `gearboxId` = '.$gearbox.'';
            $query8 = empty($mileageMin) ? '' : 'AND `mileage` >= '.$mileageMin.'';
            $query9 = empty($mileageMax) ? '' : 'AND `mileage` <= '.$mileageMax.'';
            $query10 = empty($yearMin) ? '' : 'AND `year` >= '.$yearMin.'';
            $query11 = empty($yearMax) ? '' : 'AND `year` <= '.$yearMax.'';
            $query12 = empty($priceMin) ? '' : 'AND `price` >= '.$priceMin.'';
            $query13 = empty($priceMax) ? '' : 'AND `price` <= '.$priceMax.'';
            $query14 = empty($priceType) ? '' : 'AND `priceType` = '.$priceType.'';
            $query15 = isset($_SESSION["userId"]) ? 'AND `userId` != "'.$_SESSION['userId'].'"' : '';
            $stmt = $connection->prepare("SELECT * FROM `adinfo` 
            WHERE `aid` != 0 $query1 $query2 $query3 $query4 $query5 $query6 $query7 $query8 $query9 $query10 $query11 $query12 $query13 $query14 $query15
            ORDER BY `date` DESC");
            $stmt->execute();    
        ?>
        <div class="container">
            <h1>Axtariş nəticələri</h1>
            <hr/>
            <?php if($stmt->rowCount() > 0): ?>
            <div class="ads">
                <?php while($result = $stmt->fetch()):?>
                    <form onclick="window.location.href='?page=detail&id=<?=$result['aid']?>'" class="ad">
                        <?php
                            $imgs = $connection->prepare("SELECT * FROM `car_image` WHERE `adId` = '".$result['aid']."' ORDER BY 'id' LIMIT 1");
                            $imgs->execute();
                            $imgsRes = $imgs->fetch();
                        ?>
                        <div class="image">
                            <img src="../../../../Coursework/site/resources/images<?=$imgsRes['path']?>" onerror="this.src = 'https:upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png?20200912122019'">
                        </div>
                        <div class="information">
                            <div>
                                <p class="price"><?=number_format($result['price'], 0, '.', ' ')?> <?=$result['priceType'] == 0 ? 'AZN' : (($result['priceType'] == 1 ? 'USD' : 'EUR')) ?></p>
                            </div>
                            <div>
                                <p class="main"><?=$result['brand']?> <?=$result['model']?></p>
                            </div>
                            <div>
                                <p class="main"><?=$result['year']?>, <?=number_format($result['capacity'] / 1000, 1, '.', ',')?> L, <?=number_format($result['mileage'], 0, '.', ' ')?> <?=$result['mileageType'] == 0 ? 'km' : 'mi'?></p>
                            </div>
                            <div>
                                <p class="datetime"><?=$result['city']?>, <?=$result['date']?></p>
                            </div>
                        </div>
                    </form>
                <?php endwhile ?>
            </div>
            <?php else: ?>
                <div class="noninfo">
                    <svg width="7vw" height="7vh" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="red" d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path>
                    </svg>
                    <h2>Təəssüf ki, axtarışınız əsasında heç nə tapılmadı.</h2>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>
    
    <div class="container">
        <h1>Bütün elanlar</h1>
        <hr/>
        <div id="all" class="ads"></div>
        <div id="pagination" class="pagination"></div>  
    </div>
</div>