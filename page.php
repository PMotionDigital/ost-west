<?php get_header(); ?>
<div class="page-default dis-flex justify-content-center">
    <div class="col-lg-11">
        <div class="section-title type-1">
            <h1><?php the_title(); ?></h1>
        </div>
        <?php 
            include 'functions/func-stream.php';
        ?>
    </div>
</div>
<?php get_footer(); ?>