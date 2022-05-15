<?php 
    $aid = isset($_GET['id']) ? (is_numeric($_GET['id']) ? $_GET['id'] : '0') : '0';

    $stmt = $connection->prepare("SELECT * FROM `adinfo` WHERE `aid` = $aid");
    $stmt->execute();
    
    $imgs = $connection->prepare("SELECT * FROM `car_image` WHERE `adId` = $aid ORDER BY `id`");
    $imgs->execute();
    $images = $imgs->fetchAll();
    
    function phone_format($phone) {
        $phone = (string) $phone;
        $result = '(0' . $phone[0] . $phone [1] . ') ' . $phone[2] . $phone[3] . $phone[4] . '-' . $phone[5] . $phone[6] . '-' . $phone[7] . $phone[8];
        return $result;
    }
?>
<div class="detail-container">
    <div class="container">
        <?php if($row = $stmt->fetch()): ?>
            <div class="imgdiv">
                <?php 
                    for($i = 0; $i < count($images); $i++) {
                        if($i == 0) {
                            echo "<div class='main'>
                            <img id='$i' src='../../../../Coursework/site/resources/images".$images[$i]['path']."' class='carImage'/>
                            </div>";
                            break;
                        }
                    }

                    echo "<div class='others ".(count($images) < 10 ? 'few' : (count($images) < 17 ? 'middle' : 'many'))."'>";
                    for($i = 0; $i < count($images); $i++) {
                        if($i != 0) {
                            echo "<div class='other'>
                            <img id='$i' src='../../../../Coursework/site/resources/images".$images[$i]['path']."' class='carImage ".(count($images) < 10 ? 'few' : (count($images) < 18 ? 'middle' : 'many'))."'/>
                            </div>";
                        }
                    }
                    echo "</div>";
                ?>
            </div>
            <div class="short">
                <p class="info"><?=$row["brand"]?> <?=$row["model"]?>, <?=number_format($row['capacity'] / 1000, 1, '.', ',')?> L, <?=$row['year']?> il</p>
            </div>
            <div class="short">
                <p class="price"><?=number_format($row['price'], 0, '.', ' ')?> <?=$row['priceType'] == 0 ? 'AZN' : (($row['priceType'] == 1 ? 'USD' : 'EUR')) ?></p>
                <div class="contactinfo">
                    <h3 class="phone"><?=phone_format($row['phone'])?></h3>
                    <p onclick="window.location.href='?page=profile&id=<?=$row['userId']?>'" class="name"><?=$row['name']?></p>
                </div>
            </div>
            <div class="full">
                <table>
                    <tr><th>Şəhər</th><td><?=$row['city']?></td></tr>
                    <tr><th>Marka</th><td><?=$row['brand']?></td></tr>
                    <tr><th>Model</th><td><?=$row['model']?></td></tr>
                    <tr><th>Buraxılış ili</th><td><?=$row['year']?></td></tr>
                    <tr><th>Ban növü</th><td><?=$row['body']?></td></tr>
                    <tr><th>Rəng</th><td><?=$row['color']?></td></tr>
                    <tr><th>Mühərrik</th><td><?=number_format($row['capacity'] / 1000, 1, '.', ',')?> L</td></tr>
                    <tr><th>Mühərrikin gücü</th><td><?=$row['power']?> a.g.</td></tr>
                    <tr><th>Yanacaq növü</th><td><?=$row['fuel']?></td></tr>
                    <tr><th>Yürüş</th><td><?=number_format($row['mileage'], 0, '.', ' ')?> <?=$row['mileageType'] == 0 ? 'km' : 'mi'?></td></tr>
                    <tr><th>Sürətlər qutusu</th><td><?=$row['gearbox']?></td></tr>
                    <tr><th>Ötürücü</th><td><?=$row['drive']?></td></tr>
                    <tr><th>Qiymət</th><td style="color: red; font-weight:bold;"><?=number_format($row['price'], 0, '.', ' ')?> <?=$row['priceType'] == 0 ? 'AZN' : (($row['priceType'] == 1 ? 'USD' : 'EUR')) ?></td></tr>
                </table>
                <div class="description">
                    <div class="extras">
                        <ul>
                            <?=$row['wheel'] == 1 ? '<li>Yüngül lehimli disklər</li>' : ''?>
                            <?=$row['abs'] == 1 ? '<li>ABS</li>' : ''?>
                            <?=$row['luke'] == 1 ? '<li>Lyuk</li>' : ''?>
                            <?=$row['rain'] == 1 ? '<li>Yağış sensoru</li>' : ''?>
                            <?=$row['closure'] == 1 ? '<li>Mərkəzi qapanma</li>' : ''?>
                            <?=$row['radar'] == 1 ? '<li>Park radarı</li>' : ''?>
                            <?=$row['conditioner'] == 1 ? '<li>Kondisioner</li>' : ''?>
                            <?=$row['heating'] == 1 ? '<li>Oturacaqların isidilməsi</li>' : ''?>
                            <?=$row['salon'] == 1 ? '<li>Dəri salon</li>' : ''?>
                            <?=$row['xenon'] == 1 ? '<li>Ksenon lampalar</li>' : ''?>
                            <?=$row['camera'] == 1 ? '<li>Arxa görüntü kamerası</li>' : ''?>
                            <?=$row['curtains'] == 1 ? '<li>Yan pərdələr</li>' : ''?>
                            <?=$row['ventilation'] == 1 ? '<li>Oturacaqların ventilyasiyası</li>' : ''?>
                        </ul>
                    </div>
                    <div class="text"><p><?=$row['info']?></p></div>
                    <?php if(isset($_SESSION['userId']) && $_SESSION['userId'] == $row["userId"]): ?>
                        <div class="button">
                            <a href="?action=delete&id=<?=$aid?>">Elanı sil</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div id="fullpage" class="modal">
                <div id="background" class="background"></div>
                <div class="content">
                    <div class="header">
                        <svg id='close' class="close" width='2vw' height='3vh' fill='currentColor' viewBox='0 0 16 16'>
                            <path d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="body">
                        <svg id="prev" fill="currentColor" class="arrow" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        <img id="fullsize"/>
                        <svg id="next" fill="currentColor" class="arrow" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </div>
                    <div class="footer"><p id="footer"></p></div>
                </div>
            </div>
            <?php else: ?>
                <div class="noninfo"><h1>Elan tapılmadı</h1></div>              
            <?php endif ?>
    </div>
</div>