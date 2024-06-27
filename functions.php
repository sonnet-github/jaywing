<?php
    /**
     * Functions.php
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since SDEV WP Theme 2.0
     */
    if(!isset($_SESSION)){
        session_start();
    }
    define('DEV_ENV', 1);

    /* Show errors if DEV_ENV is set to 1 */
    if(DEV_ENV === 1){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    
    /* remove "Private: " from titles */
    function remove_private_prefix($title) {
        $title = str_replace('Private: ', '', $title);
        return $title;
    }
    add_filter('the_title', 'remove_private_prefix');

    /* remove p tag wrap in images */
    function filter_ptags_on_images($content) {
        $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
        return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
    }
    add_filter('acf_the_content', 'filter_ptags_on_images');
    add_filter('the_content', 'filter_ptags_on_images');

    /* Add theme support for plugin features */
    add_theme_support( 'title-tag' );
    add_theme_support( 'yoast-seo-breadcrumbs' );

    /* SDEV Bootstrap */
    require_once('lib/sdev/sdev.php');

    /* Register ACF Blocks */
    require_once('src/views/blocks/register.php');

    /* Register theme assets */
    wp_register_style( 'google-fonts', 'https://use.typekit.net/mni3ffg.css' );
    wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
    wp_register_style( 'reset-css', \SDEV\Utils::getThemeResourcePath( 'assets/css/reset.css' ) );
    wp_register_style( 'sdev-theme-style', \SDEV\Utils::getThemeResourcePath( 'dist/style.css' ), array(), rand(111,9999), 'all' );
    wp_register_script( 'sdev-theme-script', \SDEV\Utils::getThemeResourcePath( 'dist/bundle.js' ), array('jquery'), rand(111,9999), true );

    /* Enqueue FE assets */
    function front_assets(){
        wp_enqueue_style( 'reset-css' );
        wp_enqueue_style( 'sdev-theme-style' );
        wp_enqueue_script( 'sdev-theme-script' );
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'fontawesome');
    }

    /* Enqueue admin assets */
    function custom_admin_assets(){
        /* So our FE fonts and styles will reflect in admin acf block editor and there's no need to add stylesheet in each block. */
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'sdev-theme-style' );
    }

    /* Hook them */
    add_action( 'wp_enqueue_scripts', 'front_assets' );
    add_action( 'admin_enqueue_scripts', 'custom_admin_assets' );
    register_sidebar();
?>