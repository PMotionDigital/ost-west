<?php 
    get_header(); 
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
?>
<div class="front-posts dis-flex justify-content-center">
    <div class="col-lg-11">
        <div class="section-title type-1">
            <h2>Новости</h2>
        </div>
        <section class="main-posts">
            <div class="main-posts_left left">
                <?php
                    $posts = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'         => 'post',
                        'cat'               => $category_id,
                        'category__not_in'  => array(4,5) ,
                        'meta_query'	=> array(
							'relation'		=> 'AND',
							array(
								'key'	 	=> 'post_highlight',
								'value'	  	=> '"highlight"',
								'compare' 	=> 'LIKE',
							)
						)
                    ));

                        foreach ($posts as $post) {
                            setup_postdata($post);

                            set_query_var('class', 'left_post');
                            get_template_part( 'templates/parts/main-post');

                        }
                        wp_reset_postdata();
                ?>
            </div>
            <div class="main-posts_sidebar sidebar">
                <?php
                    $posts = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'         => 'post',
                        'cat'               => $category_id,
                        'category__not_in'  => array(4,5) ,
                        'meta_query'	=> array(
							'relation'		=> 'AND',
							array(
								'key'	 	=> 'post_highlight',
								'value'	  	=> '"highlight"',
								'compare' 	=> 'NOT LIKE',
							)
						)
                    ));

                    foreach ($posts as $post) {
                        setup_postdata($post);

                        set_query_var('class', 'sidebar_post');
                        set_query_var('thumbnail', 'none');
                        get_template_part( 'templates/parts/main-post');
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>