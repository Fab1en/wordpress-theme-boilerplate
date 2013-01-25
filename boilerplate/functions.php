<?php
// head cleanup
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'noindex');

// Remove admin bar on the front side
//add_filter( 'show_admin_bar', '__return_false' );

add_action('after_setup_theme', 'boilerplate_domain_to_change_translate');
function boilerplate_domain_to_change_translate(){
    load_theme_textdomain('boilerplate_domain_to_change', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'boilerplate_domain_to_change_theme_features');
function boilerplate_domain_to_change_theme_features(){
    add_theme_support( 'post-thumbnails' );
}

add_action('wp_head', 'boilerplate_domain_to_change_head', 0);
function boilerplate_domain_to_change_head(){ 
?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title() ?></title>
    <meta name="viewport" content="width=device-width">
    
    <link rel="apple-touch-icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.png" />
    <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico" />
<?php
}

add_action('wp_enqueue_scripts', 'boilerplate_domain_to_change_print_assets');
function boilerplate_domain_to_change_print_assets(){
    // To use this, define the THEME_ASSETS_VERSION constant in the wp-config.php (or wherever you want)
    $ver = defined('THEME_ASSETS_VERSION') ? THEME_ASSETS_VERSION : false;
        
    if(defined('SCRIPT_DEBUG')){
        // unminified jquery for debug
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://code.jquery.com/jquery-1.8.3.js');
    }
    
    // stylesheets (follow SMACSS guidelines)
    wp_enqueue_style('base', get_stylesheet_directory_uri().'/css/base.css', array(), $ver);
    wp_enqueue_style('layout', get_stylesheet_directory_uri().'/css/layout.css', array('base'), $ver);
    wp_enqueue_style('module', get_stylesheet_directory_uri().'/css/module.css', array('base', 'layout'), $ver);
    wp_enqueue_style('state', get_stylesheet_directory_uri().'/css/state.css', array('base', 'layout', 'module'), $ver);
    wp_enqueue_style('theme', get_stylesheet_directory_uri().'/css/theme.css', array('base', 'layout', 'module', 'state'), $ver);
    
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr-2.6.1.min.js', array(), '2.6.1', false);
    wp_enqueue_script('history', get_template_directory_uri().'/js/libs/history.min.js', array(), '3.2.0', true);
    wp_enqueue_script('plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'), $ver, true);
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery', 'plugins', 'history'), $ver, true);
}

?>
