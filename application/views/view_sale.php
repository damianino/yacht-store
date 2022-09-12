<div class="container-fluid p-0">
    <div class="row">
        <div class="col d-flex justify-content-center selected" onclick="saleMode()">
            <p class="fs-3 p-3 m-0 bold" >КУПИТЬ</p>
        </div>
        <div class="col d-flex justify-content-center unselected" onclick="rentMode()">
            <p class="fs-3 p-3 m-0 bold" >АРЕНДОВАТЬ</p>
        </div>
    </div>
    <div class="container-fluid m-0 mb-5 p-3">
        <div id="forItems" class="container-fluid w-75">
            <div class="boat-params mb-4">
                <div class="choice m-2 p-2 border d-inline-block">
                    <p class="h6 bold">Длина от: <span class="length-min font-weight-normal">40</span> м </p>
                    <input id="minLength" type="range" min=20 max=60 onchange="$('.length-min').text(formatPrice($('#minLength').val()))"></input>
                </div>
                <div class="choice m-2 p-2 border d-inline-block">
                    <p class="h6 bold">Цена от: <span class="price-max font-weight-normal">5 000 000</span> € </p>
                    <input id="maxPrice" type="range" min=0 max=10000000 onchange="$('.price-max').text(formatPrice($('#maxPrice').val()))"></input>
                </div>

                <div class="choice m-2 p-2 border d-inline-block">
                    <p class="h6 bold">Мин. вместимость от <span class="capacity-min font-weight-normal">4</span> человека</p>
                    <input id="minCapacity" type="range" min=1 max=24 onchange="$('.capacity-min').text(formatPrice($('#minCapacity').val()))"></input>
                </div>
                <div class="choice m-2 p-2 border d-inline-block">
                    <p class="h6 bold">Мощность от <span class="power-min font-weight-normal">7000</span> л.с.</p>
                    <input id="minPower" type="range" min=0 max=7000 onchange="$('.power-min').text(formatPrice($('#minPower').val()))"></input>
                </div>
                <div id="search" class="submit m-2 p-2 rounded-pill d-inline-block" onclick="updateItems('yachts_sale')">
                <p class="h6 bold m-0 px-4 py-2 bi-search" style="color: white;">   ИСКАТЬ</p>
                </div>
            </div>
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
                            <img class="img-fluid" src="../../assets/images/'.$item['image_path'].'">
                        </div>
                        <p class="port h6 mb-0 float-left">
                            <i class="bi-geo-alt-fill h6 mr-1 mx-1"></i>'.$item['port'].'
                        </p>
                        <p class="name h5 mb-0 bold">'.$item['name'].'</p>
                        <p class="price h6">'.$item['price'].'</p>
                        <a class="clickable-cover" href="sale/item/yachts_sale/'.$item["id"].'"></a>
                    </div>
                    ';
                    $i++;
            }
            for ( $i; $i<3;$i++){
                echo '<div class="col mx-3 p-0 pb-2 item-tile shadow-sm border"></div>';
            }
            echo '</div>';
            ?>
            
        </div>
    </div>
</div>