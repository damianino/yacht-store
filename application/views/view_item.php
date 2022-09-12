<img src="/assets/yacht-logo.svg" id = "itemPageLogo" class="mt-3" height="64px" style="top:50px; position:absolute;padding-left:1rem">
<div class="modal-bg" style="display:none;" onclick="hideModal()">
    <div class="offer-modal rounded webkit-center bg-light" style="transform:scale(0.2)">
            <p class="fs-4">Менеджер свяжется с вами в течении 10 минут
            <p><input class="form-control w-75" type="tel" placeholder="Ваш мобильный">
            <p><input class="form-control w-75" type="email" placeholder="Ваша электронная почта">
            <p><a class="btn btn-primary">Жду звонок</a>
        </div>
</div>
<div class="container-fluid w-75 p-0">
    <div class="row pt-4 px-4 mb-3">
        <div class="col-8">
            <p class="mx-3 fs-3 bold"><? echo $data['name'] ?>
            <p class="fs-5 rounded description">
                <? echo $data['description'] ?>
            </p>
        </div>
        <div class="col-4 px-5">
            <p class="fs-3 mb-0"> </p>
            <ul class="params rounded list-group list-group-flush bg-light">
                <li class="fs-4 list-group-item">Порт <span class="float-end"><? echo $data['port'] ?></span></li>
                <li class="fs-4 list-group-item">Цена <? 
                                                                                    if($data['table']=='yachts_rent'){
                                                                                        echo '<span class="float-end">/день</span>';
                                                                                    }
                                                                                    echo '<span class="price float-end">';
                                                                                    echo $data['price']; ?></span></li>
            </ul>
            <p class="fs-3">Характреистики</p>
            <ul class="params rounded list-group list-group-flush bg-light">
                <li class="fs-4 list-group-item">Порт <span class="float-end"><? echo $data['port'] ?></span></li>
                <li class="fs-4 list-group-item">Длина <span class="float-end"><? echo $data['length'] ?> м</span></li>
                <li class="fs-4 list-group-item">Мощность <span class="float-end"><? echo $data['power'] ?> л.с</span></li>
                <li class="fs-4 list-group-item">Вместимость <span class="float-end"><? echo $data['capacity'] ?> ч</span></li>
            </ul>
            <div class="contact-seller rounded px-3 py-2" onclick="showModal()">
                <p class="bi-phone my-2 fs-4">Получить предложение</p>
            </div>
        </div>
    </div>
</div>