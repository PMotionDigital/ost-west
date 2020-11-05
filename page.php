<?php get_header(); ?>
<div class="page-default dis-flex justify-content-center">
    <div class="col-lg-7 col-lm-11 col-xs-11">
        <div class="section-title type-1">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="page-default_content text-block">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>