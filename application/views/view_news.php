<div class="container-fluid m-0 mb-5 p-3">
    <div class="container-fluid w-75">
        
        <?
            foreach($data['news'] as $article){
                echo '<div class="col mx-3 mb-5 p-0 pb-2 item-tile shadow-sm border">
                <div class="news-cover m-0 p-0 mb-3" style="background-image: url(assets/images/'.$article['image_path'].');">
                </div>
                <p class="h2 bold p-3">'.$article['header'].'</p>
                <p id="articleText" class="fs-5 mb-0 p-3 mx-4">
                '.$article['body'].'
                </p>
                <div class="text-end fs-5 mb-0 px-4">
                    <p>'.$article['timestamp'].'<p>
                </div>
            </div>';
            }
        ?>
    </div>
</div>