<div class="nowtv dis-flex justify-content-center">
    <div class="col-lg-11 dis-flex align-items-center">
        <div class="nowtv_title">
            Сейчас в эфире:
        </div>
        <div class="nowtv_list">
            <?php 
                $cur_date = current_time('d.m.Y');
                $cur_time = current_time('H:i');

                get_template_part('templates/parts/components/json-programm'); 

                $programm_data = get_query_var('data');

            ?>

            <?php 
                $first_item = 0;
                foreach($programm_data as $count => $programm_item) {
                    if( $cur_date == $programm_item['Дата'] && ($cur_time <= date( 'H:i', strtotime($programm_data[$count+1]['Время']))) ) { 
            ?>
                    <div class="nowtv_list-item <?php 
                    if($first_item == 0) { echo 'nowtv_list-item--active'; }?>">
                        <?php print_r( date( 'H:i', strtotime($programm_item['Время']) ) ); ?>
                        <?php echo $programm_item['Название фильма']; ?>
                    </div>        
            <?php       
                    $first_item++; 
                    }
                   
                } 
            ?>
        </div>
    </div>
</div>