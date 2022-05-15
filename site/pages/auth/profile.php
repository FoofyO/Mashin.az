<?php 
    if(!isset($_GET['id'])) header("Location: ?page=login");
    else $uid = $_GET['id'];
   
    $stmt = $connection->prepare("SELECT * FROM `userinfo` WHERE `uid` = '".$uid."'");
    $stmt->execute();
    $row = $stmt->fetch();
?>
<div class="profile-container">
    <div class="container">
        <div class="header">    
            <div class="user">
                <?php if($row):?>
                    <div>
                        <img src='../../../../Coursework/site/resources/images<?=$row['path']?>'>
                    </div>
                    <div class='info'>
                        <h3><?=$row['name']?></h3>
                        <h3><?=$row['city']?></h3>
                        <h3>0<?=$row['phone']?></h3>
                    </div>
            </div>
            <?php if(isset($_SESSION['userId']) && $_SESSION['userId'] == $uid): ?>
                <div class="options">
                    <a class='link blue' href='?page=settings'>
                        <svg width='2vw' height='3vh' fill='currentColor' viewBox='0 0 16 16'>
                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                        </svg>
                        <span>Profili düzəliş et</span>
                    </a>
                    <a class='link purple' href='?action=logout'>
                        <svg width='2vw' height='3vh' fill='currentColor' viewBox='0 0 16 16'>
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        <span>Çıxış</span>
                    </a>
                </div>
            <?php endif ?>
        </div>
        <hr>
        <?php 
            $stmt = $connection->prepare("SELECT * FROM `ad` WHERE `userId` = '".$uid."'");
            $stmt->execute();
            $col = $stmt->fetchColumn(); 
        ?>
        <?php if($col > 0):?>
        <?php 
            $stmt = $connection->prepare("SELECT * FROM `adinfo` WHERE `userId` = '".$uid."' ORDER BY `date` DESC");
            $stmt->execute();
        ?> 
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
        <?php else:?>
            <div class="noninfo">
                <svg width="5vw" height="6vh" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
                </svg>
                <h1>Elanlar hələ yoxdur</h1>
            </div>
        <?php endif ?>
    <?php else:?>
        <h1>İstifadəçi tapılmadı</h1>
        </div>
    </div>
    <?php endif ?>