<div class="nowtv dis-flex justify-content-center">
    <div class="col-lg-11 dis-flex align-items-center">
        <div class="nowtv_title">
            Сейчас в эфире:
        </div>
        <div class="nowtv_list">
            <?php 
                $cur_date = current_time('d.m.Y');
                $cur_time = current_time('H:i:s');

                get_template_part('templates/parts/components/json-programm'); 

                $programm_date = get_query_var('programm_date');
                $programm_time = get_query_var('programm_time');
                $programm_name = get_query_var('programm_name');
                $data = get_query_var('data');

            ?>

            <?php 
                foreach($data as $date) {
                    if($cur_date == $date['Дата']) { 
            ?>
                    <div class="nowtv_list-item">
                        <?php print_r( date( 'H:i', strtotime($date['Время']) ) ); ?>
                    </div>        
            <?php        
                    }
                } 
            ?>
        </div>
    </div>
</div>