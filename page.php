<?php get_header(); ?>
<div class="page-default dis-flex justify-content-center">
    <div class="col-lg-11">
        <div class="section-title type-1">
            <h1><?php the_title(); ?></h1>
        </div>
        <?php 
            function is_subscribe_work($user_id){
                global $wpdb;
                $curr_dt = new DateTime('now');
                $curr_dt = $curr_dt->format('Y-m-d H:i:s');
                $sql = "
                    SELECT EXISTS(
                        select t.* 
                        FROM `wp_subscribes` t 
                        WHERE '{$curr_dt}' BETWEEN t.start_datetime and t.end_datetime 
                              and t.user_id = {$user_id}
                    ) as its_work";
                $res = $wpdb->get_row($sql, OBJECT, 0);
                return $res->its_work;
            }
            if(is_subscribe_work(1)) {
                get_template_part('templates/parts/online-stream');
            } else {
                echo 'nu pizda';
            }
            
        ?>
    </div>
</div>
<?php get_footer(); ?>