<?php 
    get_header(); 
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
?>
<div class="front-posts dis-flex justify-content-center">
    <div class="col-lg-11">
        <div class="section-title type-1">
            <h2>Новости</h2>
        </div>
        <section class="main-posts">
            <?php
                $posts = get_posts(array(
                    'posts_per_page'	=> -1,
                    'post_type'         => 'post',
                    'cat'               => $category_id,
                    'category__not_in'  => array(2,3) ,
                ));

                foreach ($posts as $post) {
                    setup_postdata($post);
                    get_template_part( 'templates/parts/main-post');
                }
                wp_reset_postdata();
            ?>
        </section>
        <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="4" category__not_in="2,3" offset="6" button_label="Загрузить ещё" button_done_label="Пока нет новостей больше"]'); ?>
    </div>
</div>
<?php get_footer(); ?>