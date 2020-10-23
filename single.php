<?php get_header(); ?>
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
        </div>
        <div class="single-post_sidebar">
            222
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>