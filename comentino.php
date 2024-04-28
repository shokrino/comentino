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
    $load_font = get_option('comentino_load_fonts');
    $load_style = get_option('comentino_load_blog_styles');
    $wc_comment_style = get_option('comentino_load_wc_styles');
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


function comentino_add_options_page() {
    add_options_page('تنظیمات کامنتینو', 'کامنتینو', 'manage_options', 'comentino', 'comentino_options_page');
}
add_action('admin_menu', 'comentino_add_options_page');

function comentino_options_page() {
    ?>
    <div class="wrap comentino-options">
        <form method="post" action="options.php">
            <?php settings_fields('comentino_options'); ?>
            <?php do_settings_sections('comentino_options'); ?>
            <?php submit_button('ذخیره تنظیمات'); ?>
        </form>
    </div>
    <?php
}
function comentino_settings_link( $links ) {
    $url = esc_url( add_query_arg(
        'page',
        'comentino',
        get_admin_url() . 'options-general.php'
    ) );
    $settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
    array_push(
        $links,
        $settings_link
    );
    return $links;
}
add_filter( 'plugin_action_links_comentino/comentino.php', 'comentino_settings_link' );

function comentino_settings_init() {
    add_settings_section('comentino_section', 'تنظیمات کامنتینو', 'comentino_section_callback', 'comentino_options');

    add_settings_field('comentino_load_blog_styles', 'فعال سازی استایل وبلاگ و ووکامرس', 'comentino_load_blog_styles_callback', 'comentino_options', 'comentino_section');
    register_setting('comentino_options', 'comentino_load_blog_styles');

    add_settings_field('comentino_load_wc_styles', 'نوع استایل کامنت ووکامرس', 'comentino_load_wc_styles_callback', 'comentino_options', 'comentino_section');
    register_setting('comentino_options', 'comentino_load_wc_styles');

    add_settings_field('comentino_load_fonts', 'فونت فارسی شبنم', 'comentino_load_fonts_callback', 'comentino_options', 'comentino_section');
    register_setting('comentino_options', 'comentino_load_fonts');
}
add_action('admin_init', 'comentino_settings_init');

function comentino_section_callback() {
}

function comentino_load_blog_styles_callback() {
    $load_blog_styles = get_option('comentino_load_blog_styles');
    ?>
    <label>
        <input type="checkbox" name="comentino_load_blog_styles" value="1" <?php checked(1, $load_blog_styles); ?> />
        استایل کامنت ها فعال شود
    </label>
    <?php
}

function comentino_load_wc_styles_callback() {
    $load_wc_styles = get_option('comentino_load_wc_styles');
    ?>
    <label class="box-label">
        <input type="radio" name="comentino_load_wc_styles" value="wc-style1" <?php checked("wc-style1", $load_wc_styles); ?> />
        <span class="title-label">استایل اول</span>
        <img src="<?php echo COMENTINO_ASSETS.'/img/style-1.webp'; ?>" alt="">
    </label>
    <label class="box-label">
        <input type="radio" name="comentino_load_wc_styles" value="wc-style2" <?php checked("wc-style2", $load_wc_styles); ?> />
        <span class="title-label">استایل دوم</span>
        <img src="<?php echo COMENTINO_ASSETS.'/img/style-2.webp'; ?>" alt="">
    </label>
    <label class="box-label">
        <input type="radio" name="comentino_load_wc_styles" value="wc-style3" <?php checked("wc-style3", $load_wc_styles); ?> />
        <span class="title-label">استایل سوم</span>
        <img src="<?php echo COMENTINO_ASSETS.'/img/style-3.webp'; ?>" alt="">
    </label>
    <style>
        .box-label {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }
        .box-label img {
            max-width: 400px;
            height: auto;
            border-radius: 15px;
        }
        .comentino-options .form-table td {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 25px;
        }
    </style>
    <?php
}

function comentino_load_fonts_callback() {
    $load_fonts = get_option('comentino_load_fonts');
    ?>
    <label>
        <input type="checkbox" name="comentino_load_fonts" value="1" <?php checked(1, $load_fonts); ?> />
        فونت فارسی شبنم فعال شود
    </label>
    <?php
}
