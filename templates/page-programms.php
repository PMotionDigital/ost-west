<?php /* Template Name: Страница - программы */ get_header(); ?>
    <section class="programm col-lg-12">
        <!--<div class="programms_modal" data-programms-modal>
            <div class="modal-content"></div>
            <div class="modal-wrapper"></div>
        </div>-->
        <div class="programms_wrapper">
            <div class="dis-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="section-title type-1 margin-b-1">
                        <h2>Наши программы</h2>
                    </div>
                </div>
            </div>
            <div class="programms_list dis-grid grid-col-lg-3 grid-col-xs-1 grid-gap-1 col-lg-11">
                <?php
                $posts = get_posts(array(
                    'posts_per_page'	=> -1,
                    'post_type'			=> 'post',
                    'category_name'		=> 'nashi-programmy'
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
        <div class="programms_wrapper">
            <div class="dis-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="section-title type-1 margin-b-1">
                        <h2>Наши репортажи</h2>
                    </div>
                </div>
            </div>
            <div class="programms_list dis-grid grid-col-lg-3 grid-col-xs-1 grid-gap-1 col-lg-11">
            <?php
                $posts = get_posts(array(
                    'posts_per_page'	=> -1,
                    'post_type'			=> 'post',
                    'category_name'		=> 'nashi-reportazhi'
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
                        <h3><?php echo get_the_title($item); ?></h3>
                        <p><?php echo $item->snippet->description; ?></p>
                        <div class="programm-list_item-buttons">
                            <a href="https://www.youtube.com/watch?v=CQ0CjQbXfas&list=<?php echo get_field('playlist_id', $item); ?>" target="_blank" class="button type-2">Смотреть</a>
                            <a href="<?php echo get_permalink($item) ?>" class="button type-2">Эпизоды</a>
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