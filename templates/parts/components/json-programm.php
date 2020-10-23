<?php
    ob_start();
    echo do_shortcode('[table id=1 /]');
    $json_programms = ob_get_clean();
    $json_programms = json_decode($json_programms);

    $new_data = array();

    $programm_time = array();
    $programm_date = array();
    $programm_genre = array();

    foreach($json_programms as $count => $pr){
        if($count !== 0) {
            $title = $json_programms[0];
            // = 0;
            $new_item = array();
            foreach($pr as $sub_count => $program) {
                
                $new_item[$title[$sub_count]] = $program;
                
            }
            $new_data[] = $new_item;
        }
    }

    foreach($new_data as $programm_item) {
        $programm_date[] = $programm_item['Дата'];
        $programm_time[] = $programm_item['Время'];
        $programm_genre[] = $programm_item['Жанр'];
    }

    // set $vars

    set_query_var('programm_time', $programm_time);
    set_query_var('programm_date', $programm_date);
    set_query_var('data', $new_data);

?>