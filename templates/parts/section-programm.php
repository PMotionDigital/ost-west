<section class="programm">
    <div class="dis-flex justify-content-center">
        <div class="col-lg-11">
            <div class="section-title type-1">
                <h2>Наши программы</h2>
            </div>
        </div>
    </div>
    <?php
        $featured_posts = get_field('список_отображаемых_программ', 'option');
    ?>
    <div class="programm_slider programm-list" data-slider-programm>
        <?php foreach($featured_posts as $item) { ?>
        <button type="button" class="programm-list_item">
            <div class="programm-list_item-image">
                <img src="">
            </div>
            <div class="programm-list_item-desc text-block">
                <h3><?php echo get_the_title($item); ?></h3>
                <p><?php echo $item->snippet->description; ?></p>
                <div class="programm-list_item-buttons">
                    <a href="../programma" class="button type-2">Смотреть</a>
                    <a href="<?php echo get_permalink($item) ?>" class="button type-2">Эпизоды</a>
                </div>
            </div>
        </button>
        <?php } ?>
    </div>
</section>