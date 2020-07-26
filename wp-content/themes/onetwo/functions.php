<?php

/*
* Отключить "Панель инструментов"
*/
add_filter('show_admin_bar', '__return_false'); 

/*
* Подключаем свои стили и скрипты
*/
add_action( 'wp_enqueue_scripts', 'custom_scripts_method' );
function custom_scripts_method(){
        wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style( 'style', get_stylesheet_uri());
        
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://code.jquery.com/jquery-1.12.4.js"), false, '1.12.4', true); 
        wp_enqueue_script('jquery');
        
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('newscript', get_template_directory_uri().'/js/main.js', array(), false, true);
}

/*
* Удаляем лишнее из шапки
*/
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'rsd_link' ); 
remove_action( 'wp_head', 'wlwmanifest_link' ); 
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); 
remove_action( 'wp_head', 'wp_generator' ); 
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


function register_new_sidebar() {
 
	/* Регистрируем сайдбар */
	register_sidebar(
		array(
			'id' => 'right_side',
			'name' => 'Правый сайдбар',
			'description' => 'Данный сайдбар позволит добавить что-либо в правую колонку сайта',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-heading">',
			'after_title' => '</h4>'
		)
	);
}
add_action( 'widgets_init', 'register_new_sidebar' );

// класс для li в меню
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// класс active в меню
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


// Уведомление об обновлении (просто так...)
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');