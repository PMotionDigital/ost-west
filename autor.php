<?php get_header(); ?>

<section style="margin-top: 4rem;" class="user-profile dis-flex justify-content-center">
    <div class="col-lg-11">
    <?php
    acf_form_head();
    get_header();
    $author_id = get_the_author_meta('ID');
    echo $author_id;
    $avatar_image= get_field('аватарка', 'user_'. $author_id );
    $linkedin_link= get_field('какой-то_текст', 'user_'. $author_id );
    ?>

    <img src="<?php echo $avatar_image; ?>">
    <p><?php echo $linkedin_link; ?></p>
    </div>
</section>

<?php get_footer(); ?>