<?php get_header(); ?>
<?php get_template_part('templates/parts/section-programm'); ?>
<?php get_template_part('templates/parts/section-now-tv'); ?>
<div class="front-posts dis-flex justify-content-center">
    <div class="col-lg-11">
        <div class="section-title type-1">
            <h2>Новости</h2>
        </div>
        <?php get_template_part('templates/parts/section-main-posts'); ?> 
    </div>
</div>
<?php get_footer(); ?>