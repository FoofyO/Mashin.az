<?php
    if(!isset($_SESSION["user"])) header('Location: ?page=login'); 
    $page = isset($_GET["tab"]) ? $_GET["tab"] : 'profupd'; 
?>
<div class="settings-container">
    <div class="container">
        <div class="setting">
            <a href="?page=settings&tab=profupd" class="item <?=($page == 'profupd' ? 'active' : '')?>">
                <div>Profili düzəliş et</div>
            </a>
            <a href="?page=settings&tab=passupd" class="item <?=($page == 'passupd' ? 'active' : '')?>">
                <div>Şifrəni dəyişdirmək</div>
            </a>
            <a href="?page=settings&tab=imgupd" class="item <?=($page == 'imgupd' ? 'active' : '')?>">
                <div>Profilin şəklini dəyişdirmək</div>
            </a>
        </div>
        <hr/>
        <?php include 'pages/auth/'.$page.'.php'; ?>
    </div>
</div>