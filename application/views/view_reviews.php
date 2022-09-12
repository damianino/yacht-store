<div class="container-fluid m-0 mb-0 p-3">
    <div class="container-fluid text-center w-75">
        <? 
            foreach ($data['reviews'] as $review){
                echo'
                <div class="review-container rounded border shadow overflow-hidden mb-4 py-0 w-50">
                <div class="row review-header shadow-sm m-0">
                    <div class=" col-2 thumbnail rounded-circle m-2 p-0 overflow-hidden"><img class="img-fluid h-100" src="../../assets/images/404.jpg"></div>
                    <div class="col p-3 reviewer-name-container position-relative">
                        <p class="reviewer-name">'.$review['name'].'</p>
                        <p class="reviewer-city">'.$review['city'].'</p>
                    </div>
                </div>
                <div class="container p-3 review-container">
                    <p class="review ">
                        '.$review['text'].'
                    </p>
                </div>
            </div>
                ';
            }
        
        ?>
    </div>
    <div class="container-fluid text-center w-75">
        <div class="leave-review text-start mx-auto w-50">
            <p class="h5 mb-3 px-3">Имя</p>
            <input id="name" type="text" class="w-100 mb-3">
            <p class="h5 mb-3 px-3">Город</p>
            <input id="city" type="text" class="w-100 mb-3">
            <p class="h5 mb-3 px-3">Отзыв</p>
            <textarea id="text" class="w-100 mb-3"> </textarea> 
            <div class="post text-center" onclick="postReview()">
                <p class="submit fs-4 rounded px-3 py-2">Отправить</p>
            </div>
        </div>
    </div>
</div>