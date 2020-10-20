<?php
    $API_key = 'AIzaSyDsAHNwID-9liXcHtQY8rRluW3lJRdVDjI';
    $channelID = 'UC6IHSAUvmsSKlABloNBzoXQ';
    $maxResults = 10;
    $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlists?part=snippet%2CcontentDetails&channelId='. $channelID .'&key='. $API_key .''));
?>
<section class="programm">
    <div class="dis-flex justify-content-center">
        <div class="col-lg-11">
            <div class="section-title type-1">
                <h2>Наши программы</h2>
            </div>
        </div>
    </div>

    <div class="programm_slider programm-list" data-slider-programm>
        <?php foreach($videoList->items as $item) { ?>
        <button type="button" class="programm-list_item">
            <div class="programm-list_item-image">
                <img src="<?php echo $item->snippet->thumbnails->high->url; ?>">
            </div>
            <div class="programm-list_item-desc text-block">
                <h3><?php echo $item->snippet->title; ?></h3>
                <p><?php echo $item->snippet->description; ?></p>
                <div class="programm-list_item-buttons">
                    <a href="../programma" class="button type-2">Смотреть</a>
                    <a href="#" class="button type-2">Эпизоды</a>
                </div>
            </div>
        </button>
        <?php } ?>
    </div>
</section>