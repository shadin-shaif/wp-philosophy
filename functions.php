<?php
if (site_url() == 'http://localhost/theme/module-1/') {
    define('VERSION', time());
} else {
    define('VERSION', wp_get_theme()->get('Version'));
}
require_once get_template_directory() . '/inc/tgm.php';

function philosophy_theme_setup()
{
    load_theme_textdomain('philosophy');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array(
        'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ));
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
    ));
    add_editor_style('assets/css/editor-style.css');
    //Register navmenu
    register_nav_menus(array(
        'primary_menu'  => __('Primary Menu', 'philosophy'),
    ));
}
add_action('after_setup_theme', 'philosophy_theme_setup');

//Assets Enqueue
function philosophy_assets()
{

    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css', array(), '1.0.0', false);
    wp_enqueue_style('fonts-css', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1.0.0', false);
    wp_enqueue_style('philosophy-base-css', get_template_directory_uri() . '/assets/css/base.css', array('fontawesome-css', 'fonts-css'), '1.0.0', false);
    wp_enqueue_style('philosophy-vendor-css', get_template_directory_uri() . '/assets/css/vendor.css', array(), '1.0.0', false);
    wp_enqueue_style('philosophy-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', false);
    wp_enqueue_style('philosophy-css', get_stylesheet_uri(), array(), VERSION, false);

    //Enqueue Scripts
    wp_enqueue_script('philosophy-modernizr-js', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '1.0.0', false);
    wp_enqueue_script('philosophy-pace-js', get_template_directory_uri() . '/assets/js/pace.min.js', array(), '1.0.0', false);
    wp_enqueue_script('philosophy-plugins-js', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('philosophy-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'philosophy_assets');
