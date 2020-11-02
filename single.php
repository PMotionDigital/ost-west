<?php 
    get_header(); 

    global $post;

    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
?>
<?php if (have_posts()):the_post(); ?>
<section class="single-post dis-flex flex-wrap-wrap justify-content-center">
    <div class="single-post_wrap col-lg-11">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<div class="page-breadcrumbs">','</div>' );
        }
        ?>
        <div class="single-post_content text-block">
            <h1 class="single-post_title">
                <?php the_title(); ?>
            </h1>
            <div class="single-post_date main-post_date">
                <?php the_date(); ?>
            </div>
            <div class="single-post_image">
                <?php 
                    if(get_the_post_thumbnail_url()) {
                        $post_image = get_the_post_thumbnail_url();
                    } else {
                        $post_image = get_template_directory_uri().'/src/img/placeholder-land.jpg';
                    }
                ?>
                <img src="<?php echo $post_image; ?>">
            </div>
            <div class="single-post_val">
                <?php the_content(); ?>
            </div>
            <div class="single-post_footer post-footer">
                <div class="post-footer_share col-lm-12 col-xs-12">
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-curtain data-size="l" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter"></div>
                </div>
                <div class="post-footer_link col-lm-12 col-xs-12">
                    <span id="copy-link" class="copied-text"><?php echo get_the_permalink($post->ID); ?></span>
                    <button class="button copied-text-btn" data-clipboard-target="#copy-link">Скопировать ссылку</button>
                </div>
            </div>
        </div>
        <div class="single-post_sidebar">
        <?php
            $posts = get_posts(array(
                'posts_per_page'	=> 3,
                'post_type'         => 'post',
                'cat'               => $category_id,
                'category__not_in'  => array(4,5)
            ));

                foreach ($posts as $post) {
                    setup_postdata($post);

                    set_query_var('class', 'sidebar_post');
                    //set_query_var('thumbnail', 'none');
                    get_template_part( 'templates/parts/main-post');
                }
                wp_reset_postdata();
        ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>