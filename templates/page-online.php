<?php /* Template Name: Страница - прямой эфир */ get_header(); ?>
<div class="page-default page-online">
    <div class="programm dis-flex justify-content-center">
        <div class="online-tv col-lg-11 dis-flex flex-wrap-wrap">
            <div class="online-tv_player col-lg-8 col-lm-12 col-xs-12">
                <?php 
                    //include '../../functions/func-stream.php';
                    get_template_part('templates/parts/online-stream');
                ?>
            </div>
            <div class="online-tv_timetable col-lg-4 col-lm-12 col-xs-12">
                <div class="section-title type-1 margin-b-2">
                    <h3>Сейчас в эфире:</h3>
                </div>
                <?php 
                    $cur_date = current_time('d.m.Y');
                    $cur_time = current_time('H:i');

                    get_template_part('templates/parts/components/json-programm'); 

                    $programm_data = get_query_var('data');

                ?>
                <?php 
                $first_item = 0;
                $counter = 0;
                foreach($programm_data as $count => $programm_item) {
                    if( $counter <= 3 && $cur_date == $programm_item['Дата'] && ($cur_time <= date( 'H:i', strtotime($programm_data[$count+1]['Время']))) ) { 
                ?>
                <div class="guide_list-item item dis-flex <?php if($first_item == 0) { echo 'guide_list-item--current'; }?>">
                    <div class="item_time"><?php print_r( date( 'H:i', strtotime($programm_item['Время']) ) ); ?></div>
                    <div class="item_desc">
                        <h4 class="item_title">
                        <?php echo $programm_item['Название фильма']; ?>
                        </h4>
                        <a href="#" class="button detail">Подробнее</a>
                    </div>
                </div>
                <?php       
                        $counter++;
                        $first_item++; 
                    }
                    
                } 
                ?>
            </div>
        </div>
    </div>
    <div class="page-online_news dis-flex justify-content-center">
        <div class="col-lg-11">
            <div class="section-title margin-b-2">
                <h2>Читайте так же</h2>
            </div>
            <div class="dis-grid grid-col-lg-4 grid-col-xs-1 grid-gap-1">
                <?php
                    $posts = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'         => 'post',
                        'cat'               => $category_id,
                        'category__not_in'  => array(4,5)
                    ));

                    foreach ($posts as $post) {
                        setup_postdata($post);
                        set_query_var('class', 'sidebar_post');
                        set_query_var('thumbnail', 'none');
                        get_template_part( 'templates/parts/main-post');
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>