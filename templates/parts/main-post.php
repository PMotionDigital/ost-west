<?php
    $post_important = get_field('important_post');
?>

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="<?php echo $post_important[0]. ' ' .$post_class; ?> main-post">
    <?php   
        if(get_the_post_thumbnail_url()) {
            $post_image = get_the_post_thumbnail_url();
        } else {
            $post_image = get_template_directory_uri().'/src/img/placeholder-land.jpg';
        } 
    ?>
    <div class="main-post_image">
        <img src="<?php echo $post_image; ?>">
    </div>
    <div class="main-post_desc text-block">
        <h3 class="main-post_title"><?php the_title(); ?></h3>
        <p class="main-post_excerpt"><?php echo get_the_excerpt(); ?></p>
        <div class="main-post_date"><?php the_date(); ?></div>
    </div>
</a>