<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='/js/index.js'></script>
    <script src=<? echo '/js/' . $page_name . '.js' ?>></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body id=<? echo $page_name ?>>

    <div id="sidebar" class="sidebar bg-midnightblue" style="width:0px">
            <ul id="navPills" class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center" style="display:none">
                <li class="nav-item">
                    <a href="/main" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                        <i class="bi-house fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="/sale" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                        <i class="bi-cart fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="/news" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                        <i class="bi-newspaper fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="reviews" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                        <i class="bi-star fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="/about" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                        <i class="bi-info-square fs-1"></i>
                    </a>
                </li>
            </ul>
    </div>
    <div class="bg-light container-fluid p-0">
        <!-- content -->
        <?php
            if($page_name == 'item'){
                $imgpath = '/assets/images/' . $data['image_path'];
                echo '
                <div id="headerImage" class="row item-image" style="background-image: url('.$imgpath.');">
                   

                </div>';
            }else{
                $imgpath = '/assets/images/' . $page_name . '.jpg';
                echo '
                <div id="headerImage" class="container-fluid p-0 mb-0 img-container">
                    <img class="img-home" src="'.$imgpath.'" alt="">
                    <div class="fill-gradient"></div>
                    <div class="true-center h-100">
                        <img src="../../assets/yacht-logo.svg" class="mt-3" height="128px" style="margin: 13%;filter:invert(100%);">
                        <p id="headerText" class="img-text fs-1 text-white">'.$data['headerText'].'</p>
                    </div>
                </div>';
            }
                
        ?>
        
        <?php include './application/views/' . $content_view; ?>
    </div>

    <footer class="bd-footer py-5 bg-dark text-light">
        <div class="container py-5">
            <div class="row">

                <div class="col-2 offset-lg-1 mb-3">
                    <h5 class="mb-3">О НАС</h5>
                    <ul class="p-0" style="list-style-type: none;">
                        <li class="mb-2">Помощь
                        <li class="mb-2">Кто мы
                        <li class="mb-2">Как это работает?
                        <li class="mb-2">Пресса
                        <li class="mb-2">Партнеры
                        <li class="mb-2">Присоединяйтесь к нам!
                    </ul>
                </div>
                <div class="col-2 mb-3">
                    <h5 class="mb-3">НАПРАВЛЕНИЯ</h5>
                    <ul class="p-0" style="list-style-type: none;">
                        <li class="mb-2">Греция
                        <li class="mb-2">Хорватия
                        <li class="mb-2">Италия
                        <li class="mb-2">Барселона
                        <li class="mb-2">Ибица
                        <li class="mb-2">Франция
                        <li class="mb-2">Мальта
                    </ul>
                </div>
                <div class="col-3 mb-3">
                    <h5 class="mb-3">ЛОДКИ</h5>
                    <ul class="p-0" style="list-style-type: none;">
                        <li class="mb-2">Аренда парусной яхты
                        <li class="mb-2">Аренда моторной яхты
                        <li class="mb-2">Аренда катамарана
                        <li class="mb-2">Аренда надувной лодки
                        <li class="mb-2">Чартер Яхта люкс
                    </ul>
                </div>
                <div class="col-2 mb-3">
                    <h5 class="mb-3">СЛЕДИТЕ ЗА НАМИ</h5>
                    <span>
                        <i class="bi-facebook mx-2 fs-3"></i>
                        <i class="bi-twitter mx-2 fs-3"></i>
                        <i class="bi-instagram mx-2 fs-3"></i>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <div id="sidebarTrigger" class="sidebar">
    </div>
    <img src="/assets/yacht-logo.svg" id = "cornerLogo" class="mt-3" height="64px" style="top:50px; position:absolute;padding-left:1rem;display:none">

</body>

</html>