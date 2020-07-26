<?php
global $wpdb;
    
// Создадим таблицу настроек плагина
    ob_start();
        require_once plugin_dir_path(__FILE__) . 'wp_attributes.sql';
$sqlFile = ob_get_clean();

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sqlFile);


// Добавляем пункт меню
add_action( 'admin_menu', 'link_attributes_Admin_Link' );
 
function link_attributes_Admin_Link()
{
    add_menu_page(
       'Плагин замены атрибутов',
       '<font style="color: #5BFF60;">Атрибуты ссылок</font>', 
       'manage_options',
       'link-attributes-plugin/includes/link_attributes_page.php',
       '',
       'dashicons-editor-unlink'
    );
}

// ajax handler | сохранить / обновить настройки плагина
add_action( 'wp_ajax_attributes', 'setAttributeDate' );
add_action( 'wp_ajax_nopriv_attributes', 'setAttributeDate' );
 
function setAttributeDate(){
 
    global $wpdb;
    
    $getCount = $wpdb->get_var("SELECT COUNT(*) FROM wp_attributes");
    
    $val = 1;
    
    if($_POST['val'] == 'false' OR $_POST['val'] == FALSE){
        $val = 0;
    }
    
    $name = $_POST['name'];

    if($getCount == 0){
        // Делаем первую вставку значения настройки плагина
        switch ($name):
            case 'page': $wpdb->insert('wp_attributes',array('type_pages' => $val),array('%d'));
                break;
            case 'post': $wpdb->insert('wp_attributes',array('type_posts' => $val),array('%d'));
                break;
            case 'nf': $wpdb->insert('wp_attributes',array('nofollow' => $val),array('%d'));
                break;
            case 'nt': $wpdb->insert('wp_attributes',array('target' => $val),array('%d'));
                break;
        endswitch;
    }
    else{
        // Обновляем значения настройки плагина
        switch ($name):
            case 'page': $wpdb->query('UPDATE wp_attributes SET type_pages = "'.$val.'"');
                break;
            case 'post': $wpdb->query('UPDATE wp_attributes SET type_posts = "'.$val.'"');
                break;
            case 'nf': $wpdb->query('UPDATE wp_attributes SET nofollow = "'.$val.'"');
                break;
            case 'nt': $wpdb->query('UPDATE wp_attributes SET target = "'.$val.'"');
                break;
        endswitch;
    }
    
	die;
}

// Функция проверки - является ли ссылка внутренней
function checkOurDomain($link){
    
    $ourDomain = $_SERVER['SERVER_NAME'];
    if(strpos($link, $ourDomain)){
        return TRUE;
    }
    return FALSE;
    
}

// Добавление атрибутов
add_filter( 'the_content', 'filterTheContent', 1 );
 
function filterTheContent($content) {
 
    global $wpdb;
    
    $html    = $content;
    $htmlDom = new DOMDocument;
    $htmlDom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $links = $htmlDom->getElementsByTagName('a');
    
    // Узнаем тип нашего поста
    $postType = get_post_type(get_the_ID());
    
    // получить настройки плагина
    $pluginSettings = $wpdb->get_row("SELECT * FROM wp_attributes");
    
    $pluginTypePage     = $pluginSettings->type_pages;
    $pluginTypePost     = $pluginSettings->type_posts;
    $pluginLinkNofollow = $pluginSettings->nofollow;
    $pluginLinkTarget   = $pluginSettings->target;
    
    if($pluginTypePage == 1){ $pluginTypePage = 'page'; }
    if($pluginTypePost == 1){ $pluginTypePost = 'post'; }
    
    if($postType == $pluginTypePage OR $postType == $pluginTypePost){

            foreach($links as $link){
                
                if(checkOurDomain($link->getAttribute('href'))){ // Если ссылка внутренняя - идем дальше
                    continue;
                }
                else{
                    if($pluginLinkNofollow == 1){
                        $link->setAttribute('rel','nofollow');
                    }
                    if($pluginLinkTarget == 1){
                        $link->setAttribute('target','_blank');
                    }
                }
                
            }
            
            $content = $htmlDom->saveHTML($htmlDom->documentElement);

            return $content;
    }
    else{
        return $content;
    }


}