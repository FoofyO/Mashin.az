<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/styles/new.css"/>
    <link rel="stylesheet" href="resources/styles/auth.css"/>
    <link rel="stylesheet" href="resources/styles/main.css"/>
    <link rel="stylesheet" href="resources/styles/style.css"/>
    <link rel="stylesheet" href="resources/styles/detail.css"/>
    <link rel="stylesheet" href="resources/styles/footer.css"/>
    <link rel="stylesheet" href="resources/styles/header.css"/>
    <link rel="stylesheet" href="resources/styles/profile.css"/>
    <link rel="stylesheet" href="resources/styles/settings.css"/>
    <link rel="icon" href="//pngimg.com/uploads/car_wheel/car_wheel_PNG23302.png"/>
    <title>Maşın.az</title>
</head>
<body>
    <div class="wrap">
        <header>
            <a href="?page=main"><h1>Maşın.az</h1></a>
            <div>
                <?php if(isset($_SESSION["user"])) : ?>
                    <a class='link orange' href='?page=newad'>
                    <svg width='2vw' height='3vh' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
                    </svg>
                    <span>Yeni elan</span>
                    </a>
                    <a class='link gray' href='?page=profile&id=<?=$_SESSION["userId"]?>'>Kabinetim</a>
                <?php else : ?>
                    <a class='link gray' href='?page=login'>
                        <svg width='2vw' height='3vh' fill='currentColor' viewBox='0 0 16 16'>
                            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                            <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                        </svg>
                        <span>Giriş</span>
                    </a>
                <?php endif?>
            </div>
        </header>
        <main>