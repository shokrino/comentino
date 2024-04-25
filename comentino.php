<?php
defined( 'ABSPATH' ) || exit;
/*
Plugin Name: Comentino
Plugin URI: https://shokrino.com/
Description: Style the comments in WordPress fast and easy
Author: <a href="https://shokrino.com/">Shokrino Team</a> & <a href="https://nias.ir">Nias</a>
Version: 1.0.0
Textdomain: comentino
*/
$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$plugin_data_name = get_file_data(__FILE__, array('Plugin Name' => 'Plugin Name'), false);
$plugin_version = $plugin_data['Version'];
$plugin_name = $plugin_data_name['Plugin Name'];
define('COMENTINO_NAME', $plugin_name);
define('COMENTINO_VERSION', $plugin_version);
define('COMENTINO_PATH' , WP_CONTENT_DIR.'/plugins'.'/comentino');
define('COMENTINO_URL' , plugin_dir_url( __DIR__ ).'comentino');
define('COMENTINO_INC' , COMENTINO_PATH.'/inc');
define('COMENTINO_CORE' , COMENTINO_PATH.'/inc/core');
define('COMENTINO_TPL' , COMENTINO_PATH.'/inc/templates');
define('COMENTINO_ASSETS' , plugin_dir_url( __DIR__ ).'comentino/assets');

function enqueue_comentino_styles() {
    $load_font = true;
    $load_style = true;
    $wc_comment_style = "wc-style2";
    if ($load_style) {
        if (is_single() && get_post_type() === 'post') {
            wp_enqueue_style('comentino-blog-styles', COMENTINO_ASSETS . '/blog-comment/blog-style1.css');
        } elseif (is_single() && get_post_type() === 'product') {
            if(!empty($wc_comment_style)) {
                wp_enqueue_style('comentino-wc-styles', COMENTINO_ASSETS . '/wc-comment/'.$wc_comment_style.'.css');
            }
        }
    }
    if($load_font) {
        wp_enqueue_style('comentino-fonts', COMENTINO_ASSETS . '/font.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_comentino_styles');
