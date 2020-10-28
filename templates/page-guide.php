<?php /* Template Name: Страница - программа передач */ get_header(); ?>
<?php 
    
    $curr_date = current_time('d.m.Y');
    $curr_time = current_time('H:i');
    //echo $curr_date;
    get_template_part('templates/parts/components/json-programm'); 
    $programm_data = get_query_var('data');
    $filter_date = $curr_date;

    $ru_weekdays = array( 
        'Monday' => 'Понедельник', 
        'Tuesday' => 'Вторник', 
        'Wednesday' => 'Среда', 
        'Thursday' => 'Четверг', 
        'Friday' => 'Пятница', 
        'Saturday' => 'Суббота', 
        'Sunday' => 'Воскресенье' 
    );
    $ru_month = array(
        '',
        'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря'
    );

    $filtered = array_filter($programm_data, 'filterProgram');
    function filterProgram($el) {
        return strtotime($el['Дата']) >= strtotime(current_time('d.m.Y'));
    };
    $weekly_programm = array();
    $weekly_days = array();
    $counter = 0;
    $prev_weekday = '';
    foreach($filtered as $item):
        if($counter < 7):
            
            $day = $ru_weekdays[date('l', strtotime($item['Дата']))];
            
            if($prev_weekday != $day):
                $prev_weekday = $day;
                $counter ++;
            endif;
            $weekly_programm[$day]['programm_items'][] = $item;
            $weekly_programm[$day]['program_date'] = intval(date('d', strtotime($item['Дата']))).' '.$ru_month[date('m', strtotime($item['Дата']))];
            $weekly_days[$day] = date('d, M', strtotime($item['Дата']));
        endif;
    endforeach;
    //print_r($weekly_programm);
?>
    <section class="guide col-lg-11 wrapper">
        <div class="guide_days col-lg-12 dis-flex justify-content-between align-items-center">
            <?php if(!wp_is_mobile()) { ?><button type="button" class="guide_days-button guide_days-button--prev"></button><?php } ?>
            <ul class="dis-flex align-items-center justify-content-center">
                <?php 
                $first = true;
                foreach($weekly_days as $day => $date): ?>
                <li class="guide_days-item <?php if($first == true){$first = false; echo 'guide_days-item--current'; }; ?>" 
                    data-day-name="<?php echo $day; ?>">
                    <button type="button"><?php echo $day; ?></button>
                </li> <?php 
                endforeach; 
                ?>
            </ul>
            <?php if(!wp_is_mobile()) { ?><button type="button" class="guide_days-button guide_days-button--next"></button><?php } ?>
        </div>
        <?php
        $first = true;
        foreach($weekly_programm as $day => $programm): ?>
        <div class="guide_programm <?php if($first){echo 'guide_programm--current'; $first = false; } ?>" data-tab-name="<?php echo $day; ?>">
            <h2 class="guide_programm-title"><?php echo $day.', '.$programm['program_date']; ?></h2>
            <div class="guide_list dis-flex flex-wrap-wrap">
                <?php 
                $items_per_col = array();
                $min_items_per_col = floor(count($programm['programm_items'])/3);
                $difference = count($programm['programm_items']) - ($min_items_per_col * 3);
                for ($i = 0; $i <= 2; $i++) {
                    if ($i < $difference):
                        $items_per_col[$i] = $min_items_per_col + 1;
                    else:
                        $items_per_col[$i] = $min_items_per_col;
                    endif;
                };

                $col_num = 0;
                $open_col = true;
                
                foreach($programm['programm_items'] as $i => $item): 
                    $class = '';
                    if($open_col):
                        echo '<div class="guide_list-section col-lg-4 col-xs-12"><ul>';
                        $open_col = false;
                    endif; ?>

                    <?php 
                    if(date('H:i', strtotime($item['Время'])) < $curr_time 
                        && strtotime($item['Дата']) <= strtotime(current_time('d.m.Y'))): 
                        $class = 'guide_list-item--past'; 
                        
                        if($curr_time < date('H:i', strtotime($programm['programm_items'][$i+1]['Время']))):
                           $class = 'guide_list-item--current';
                        endif;
                    endif;
                    ?>
                        <li class="guide_list-item item dis-flex <?php echo $class; ?>">
                            <div class="item_time"><?php echo date('H:i', strtotime($item['Время'])); ?></div>
                            <div class="item_desc">
                                <h4 class="item_title">
                                    <?php echo $item['Название фильма']; ?>
                                </h4>
                                <button data-modal-btn="details" class="button detail">Подробнее</button>
                            </div>
                            <div class="item_content">
                                <?php 
                                foreach($item as $key => $value):
                                    if($value != '' && $key != 'ID'):
                                        ?>
                                        <div class="item_content-item">
                                            <div class="name"><?php echo $key; ?>:</div>
                                            <div class="value"><?php echo $value; ?></div>
                                        </div> 
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </li> <?php
                    $items_count = $i;
                    if($items_count >= $items_per_col[$col_num] - 1):
                        $dec_val = 0;
                        foreach($items_per_col as $col => $per_col):
                            if($col < $col_num):
                                $dec_val += $per_col;
                            endif;
                        endforeach;
                        $items_count -= $dec_val;
                    endif;
                    
                    if($items_count == $items_per_col[$col_num] - 1):
                        $col_num += 1;
                        $open_col = true;
                        echo '</ul></div>'; 
                    endif;
                endforeach; ?>
            </div>
        </div> <?php
        endforeach; ?>
        <?php get_template_part('templates/parts/modals/modal-details'); ?>
    </section>
<?php get_footer(); ?>