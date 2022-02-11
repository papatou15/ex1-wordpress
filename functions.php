<?php
    function cidw_4w4_enqueue(){
        wp_enqueue_style('main-styles', 
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css'),
        false);
    }

    
    function cidw_4w4_register_my_menu(){
        register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
    }
    add_action('after_setup_theme', 'cidw_4w4_register_my_menu');
    add_action("wp_enqueue_scripts", "cidw_4w4_enqueue");

    function cidw_4w4_filtre_menu_item($monObjet){
        //var_dump($monObjet);
        foreach($monObjet as $key => $value){
            $value->title = wp_trim_words($value->title,2);
        }
        return($monObjet);
    }

    add_filter("wp_nav_menu_objects", "cidw_4w4_filtre_menu_item");
?>