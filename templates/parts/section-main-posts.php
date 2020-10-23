<section class="main-posts">
    <?php if (have_posts()):the_post(); ?>
    <div class="main-posts_left left">
        <?php
        while (have_posts()):the_post(); 
            set_query_var('class', 'left_post');
            get_template_part( 'templates/parts/main-post');
        endwhile;
        ?>
    </div>
    <div class="main-posts_sidebar sidebar">
        <?php
        while (have_posts()):the_post(); 
            set_query_var('class', 'sidebar_post');
            get_template_part( 'templates/parts/main-post');
        endwhile;
        ?>
    </div>
    <?php endif; ?>
</section>