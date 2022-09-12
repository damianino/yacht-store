<div class="container-fluid sale-section pb-3 pt-4" style="height:auto">
    <p class="h1 text-dark pb-4">Аренда и продажа яхт</p>
    <div class="sale-widget-container mx-3 my-2">
        <?
        $i = 0;
        echo '<div class="item-row row mb-3">';
        foreach ($data['items'] as $item) {
            if ($i == 3) {
                echo '</div><div class="item-row row mb-3">';
                $i = 0;
            }
            echo '
                    <div class="col mx-3 p-0 pb-2 item-tile shadow-sm border">
                        <div class="m-0 p-0 mb-3">
                            <img class="img-fluid" src="../../assets/images/' . $item['image_path'] . '">
                        </div>
                        <p class="port h6 mb-0 float-left">
                            <i class="bi-geo-alt-fill h6 mr-1 mx-1"></i>' . $item['port'] . '
                        </p>
                        <p class="name h5 mb-0 bold">' . $item['name'] . '</p>
                        <p class="price h6">' . $item['price'] . '</p>
                        <a class="clickable-cover" href="sale/item/yachts_sale/' . $item["id"] . '"></a>
                    </div>
                    ';
            $i++;
        }
        for ($i; $i < 3; $i++) {
            echo '<div class="col mx-3 p-0 pb-2 item-tile shadow-sm border"></div>';
        }
        echo '</div>';
        ?>

    </div>
</div>
<!-- REVIEWS --->
<script> reviews = <? echo json_encode($data['reviews']);?></script>

<div class="container-fluid reviews-section py-3 mb-3">
    <p class="h1 text-dark pb-4">Отзывы клиентов</p>
    <div class="reviews-section-container w-75 m-3 " style="
    position: relative;
    height: 200px;
">


        <div class="review-container rounded border bg-light shadow py-0 w-50 align-middle" style="
    position: absolute;
    left: 25%;
    z-index:0;
">
            <div class="row review-header shadow-sm m-0">
                <div class=" col-2 thumbnail rounded-circle m-2 p-0 overflow-hidden"><img class="img-fluid h-100" src="../../assets/images/404.jpg"></div>
                <div class="col p-3 reviewer-name-container position-relative">
                    <p class="reviewer-name"><?echo$data['reviews'][0]['name'];?></p>
                    <p class="reviewer-city"><? echo $data['reviews'][0]['city'];?></p>
                </div>
            </div>
            <div class="container p-3 review-container">
                <p class="review ">
                <? echo $data['reviews'][0]['text'];?>
                </p>
            </div>
        </div>
        <div class="arrow-container align-middle left" onclick="leftArrowReviews()" style="position: absolute;left: 12%;top: 50px;z-index: 2;"><i class="bi-arrow-left fs-1"></i></div>
        <div class="arrow-container align-middle" onclick="rightArrowReviews();"style="position: absolute;top: 50px;right: 12%;z-index: 2;"><i class="bi-arrow-right fs-1"></i></div>

        <div style="
    position: absolute;
    height: 140%;
    width: 50%;
    top:-20%;
    left: -25%;
    background: rgb(248,249,250);
    background: linear-gradient(90deg, rgba(248,249,250,1) 0%, rgba(248,249,250,1) 70%, rgba(248,249,250,0) 100%);
    z-index: 0;
"></div>
        <div style="
    position: absolute;
    height: 140%;
    width: 50%;
    top:-20%;
    right: -25%;
    background: rgb(248,249,250);
    background: linear-gradient(90deg, rgba(248,249,250,0) 0%, rgba(248,249,250,1) 50%,  rgba(248,249,250,1)100%);
    z-index: 0;
"></div>


    </div>
</div>
<!-- NEWS -->
<div class="container-fluid news-section py-3">
    <p class="h1 text-dark pb-4">Новости</p>
    <div class="container news-section-container w-75 py-3">
        <div class="row">
            <?
            foreach ($data['news'] as $article) {
                echo '<div class="col mx-3 p-0 pb-2 item-tile shadow-sm border">
                <div class="m-0 p-0 mb-3" style="height:250px;background-size: cover;background-repeat:norepeat; background-image: url(assets/images/' . $article['image_path'] . ');">
                    
                </div>
                <p class="h2 bold p-3">' . $article['header'] . '</p>
                <p class="fs-5 mb-0 p-3">  
                ' . $article['body'] . '                </p>
                 </div>';
            }
            ?>

        </div>
    </div>
</div>