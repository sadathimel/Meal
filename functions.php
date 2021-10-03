<?php
require_once get_theme_file_path( "/lib/csf/cs-framework.php" );
require_once get_theme_file_path( "/inc/metaboxes/section.php" );
require_once get_theme_file_path( "/inc/metaboxes/page.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-banner.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-featured.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-gallery.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-chef.php" );

define('CS_ACTIVE_FRAMEWORK', true);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', true);
define('CS_ACTIVE_SHORTCODE', true);
define('CS_ACTIVE_CUSTOMIZE', true);

function meal_theme_setup() {
    load_theme_textdomain( 'meal', get_temp_dir() . '/languages' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custum-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ] );
}

add_action( 'after_setup_theme', 'meal_theme_setup' );

function meal_assets() {
    wp_enqueue_style( 'meal-fonts', "//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700" );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css', null, '1.0' );
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.css', null, '1.0' );
    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', null, '1.0' );
    wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', null, '1.0' );
    wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/assets/css/aos.css', null, '1.0' );
    wp_enqueue_style( 'bootstrap-datepicker-css', get_template_directory_uri() . '/assets/css/bootstrap-datepicker.css', null, '1.0' );
    wp_enqueue_style( 'jquery.timepicker-css', get_template_directory_uri() . '/assets/css/jquery.timepicker.css', null, '1.0' );
    wp_enqueue_style( 'ionicons-css', get_template_directory_uri() . '/assets/fonts/ionicons/css/ionicons.min.css' );
    wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'flaticon-css', get_template_directory_uri() . '/assets/fonts/flaticon/font/flaticon.css' );
    wp_enqueue_style( 'meal-portfolio-css', get_template_directory_uri() . '/assets/css/portfolio.css', null, '1.0' );
    wp_enqueue_style( 'meal-style-css', get_template_directory_uri() . '/assets/css/style.css', null, '1.0' );
    wp_enqueue_style( 'meal-style', get_stylesheet_uri() );

    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'jquery.waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'jquery.magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'bootstrap-datepicker-js', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'jquery.timepicker-js', get_template_directory_uri() . '/assets/js/jquery.timepicker.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'jquery.stellar-js', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'jquery.easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'aos.js', get_template_directory_uri() . '/assets/js/aos.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', [ 'jquery' ], '1.0', true );
    wp_enqueue_script( 'google-map-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyAE4H_BppOKzBzXmLfLkGqS0VTjXKZ1ky0', null, '1.0', true );
    wp_enqueue_script( 'meal-portfolio-js', get_template_directory_uri() . '/assets/js/portfolio.js', [ 'jquery', 'jquery.magnific-popup-js', 'imagesloaded-js', 'isotope-js' ], '1.0', true );
    wp_enqueue_script( 'meal-main-js', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'meal_assets' );


function meal_codestar_init(){
    CSFramework_Metabox::instance(array());
}
add_action( 'ini', 'meal_codestar_init' );

function get_recipe_category($recipe_id){
    $terms = wp_get_post_terms($recipe_id,"category");
    if($terms){
        $first_term = array_shift($terms);
        return $first_term->name;
    }
    return "Food";
}