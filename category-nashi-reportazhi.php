<?php 
    get_header(); 
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
?>
    <section class="programms col-lg-12">
        <div class="programms_modal" data-programms-modal>
            <div class="modal-content"></div>
            <div class="modal-wrapper"></div>
        </div>
        <div class="programms_wrapper">
            <div class="dis-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="section-title type-1">
                        <h2><?php echo get_cat_name($category_id) ?></h2>
                    </div>
                </div>
            </div>
            <div class="programms_list dis-flex flex-wrap-wrap col-lg-11">
                <?php
                $posts = get_posts(array(
                    'posts_per_page'	=> -1,
                    'post_type'         => 'post',
                    'cat'               => $category_id
                ));

                if ($posts) :
                    foreach ($posts as $post) :
                        setup_postdata($post);
                ?>
                <button type="button" class="programm-list_item">
                    <div class="programm-list_item-image">
                        <?php 
                            if(get_the_post_thumbnail_url()) {
                                $post_image = get_the_post_thumbnail_url();
                            } else {
                                $post_image = get_template_directory_uri().'/src/img/placeholder-land.jpg';
                            }
                        ?>
                        <img src="<?php echo $post_image; ?>">
                    </div>
                    <div class="programm-list_item-desc text-block">
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        <div class="programm-list_item-buttons">
                            <a href="../programma" class="button type-2">Смотреть</a>
                            <a href="<?php the_permalink(); ?>" class="button type-2">Эпизоды</a>
                        </div>
                    </div>
                </button>
                <?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>