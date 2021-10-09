<?php
require_once get_theme_file_path( "/lib/csf/cs-framework.php" );
require_once get_theme_file_path( "/inc/metaboxes/section.php" );
require_once get_theme_file_path( "/inc/metaboxes/page.php" );
require_once get_theme_file_path( "/inc/metaboxes/recipe.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-banner.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-featured.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-gallery.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-chef.php" );
require_once get_theme_file_path( "/inc/metaboxes/section-services.php" );
require_once get_theme_file_path( "/inc/metaboxes/taxonomy-featured.php" );

define( 'CS_ACTIVE_FRAMEWORK', true );
define( 'CS_ACTIVE_METABOX', true );
define( 'CS_ACTIVE_TAXONOMY', true );
define( 'CS_ACTIVE_SHORTCODE', true );
define( 'CS_ACTIVE_CUSTOMIZE', true );

// if ( site_url() == "http://127.0.0.1/wp/landing-page" ) {
//     define( "time()", time() );
// } else {
//     define( "time()", wp_get_theme()->get( "time()" ) );
// }

function meal_theme_setup() {
    load_theme_textdomain( 'meal', get_temp_dir() . '/languages' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption'] );
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

    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'jquery.waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'jquery.magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'bootstrap-datepicker-js', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', ['jquery'], time(), true );
    wp_enqueue_script( 'jquery.timepicker-js', get_template_directory_uri() . '/assets/js/jquery.timepicker.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'jquery.stellar-js', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'jquery.easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', ['jquery'], time(), true );
    wp_enqueue_script( 'aos.js', get_template_directory_uri() . '/assets/js/aos.js', ['jquery'], time(), true );
    wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.js', ['jquery'], time(), true );
    wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'google-map-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyAE4H_BppOKzBzXmLfLkGqS0VTjXKZ1ky0', null, time(), true );
    wp_enqueue_script( 'meal-portfolio-js', get_template_directory_uri() . '/assets/js/portfolio.js', ['jquery', 'jquery.magnific-popup-js', 'imagesloaded-js', 'isotope-js'], time(), true );
    wp_enqueue_script( 'meal-main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], time(), true );

    if ( is_page_template( 'page-templates/landing.php' ) ) {
        wp_enqueue_script( 'meal-reservation-js', get_template_directory_uri() . '/assets/js/reservation.js', ['jquery'], time(), true );
        $ajaxurl = admin_url( 'admin-ajax.php' );
        wp_localize_script( 'meal-reservation-js', 'mealurl', [ 'ajaxurl' => $ajaxurl ] );
    }

}
add_action( 'wp_enqueue_scripts', 'meal_assets' );

function meal_codestar_init() {
    CSFramework_Metabox::instance( [] );
    CSFramework_Taxonomy::instance( [] );
}
add_action( 'ini', 'meal_codestar_init' );

function get_recipe_category( $recipe_id ) {
    $terms = wp_get_post_terms( $recipe_id, "category" );
    if ( $terms ) {
        $first_term = array_shift( $terms );
        return $first_term->name;
    }
    return "Food";
}

function meal_process_reservation() {
    if ( check_ajax_referer( 'reservation', 'rn' ) ) {
        $name    = sanitize_text_field( $_POST['name'] );
        $email   = sanitize_text_field( $_POST['email'] );
        $persons = sanitize_text_field( $_POST['persons'] );
        $phone   = sanitize_text_field( $_POST['phone'] );
        $date    = sanitize_text_field( $_POST['date'] );
        $time    = sanitize_text_field( $_POST['time'] );

        $data = [
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'persons' => $persons,
            'date'    => $date,
            'time'    => $time,
        ];
        // print_r( $data );

        $reservation_arguments = [
            'post_type'   => 'reservation',
            'post_author' => 1,
            'post_date'   => date( 'Y-m-d H:i:s' ),
            'post_status' => 'publish',
            'post_title'  => sprintf( '%s - Reservation for %s persons on %s - %s', $name, $persons, $date . " : " . $time, $email ),
            'meta_input'  => $data,
        ];

        $reservations = new wp_Query( [
            'post_type'   => 'reservation',
            'post_status' => 'publish',
            'meta_query'  => [
                'relation'    => 'AND',
                'email_check' => [
                    'key'   => 'email',
                    'value' => $email,
                ],
                'date_check'  => [
                    'key'   => 'date',
                    'value' => $date,
                ],
                'time_check'  => [
                    'key'   => 'time',
                    'value' => $time,
                ],
            ],
        ] );
        if ( $reservations->found_posts > 0 ) {
            echo 'Duplicate';
        } else {
            $wp_error = '';
            $reservation_id = wp_insert_post( $reservation_arguments, $wp_error );
            
            
            if ( ! $wp_error ) {
            $_name = explode(" ", $name);
            $oder_data = array(
                'first_name' => $_name[0],
                'last_name' => isset($_name[1]) ? $_name[1] : '',
                'email' => $email,
                'phone' => $phone,
            );
            $order = wc_create_order();
            $order-> set_address($order_data);
            $order-> add_product(wc_get_product(936),1);
            $order->set_customer_note($reservation_id);
            $order->calculate_totals();

            add_post_meta($reservation_id,'order_id',$order->get_id());

            echo $order->get_checkout_payment_url();
            }
        }

    } else {
        echo 'Not allowed';
    }

    die();
}
add_action( 'wp_ajax_reservation', 'meal_process_reservation' );
add_action( 'wp_ajax_nopriv_reservation', 'meal_process_reservation' );

function meal_checkout_fields($fields){

        unset($fields['billing_city']);
        unset($fields['billing_company']);
        unset($fields['billing_address_1']);
        unset($fields['billing_address_2']);
        unset($fields['billing_city']);
        unset($fields['billing_postcode']);
        unset($fields['billing_country']);
        unset($fields['billing_state']);

        unset($fields['shipping_city']);
        unset($fields['shipping_first_name']);
        unset($fields['shipping_last_name']);
        unset($fields['shipping_company']);
        unset($fields['shipping_address_1']);
        unset($fields['shipping_address_2']);
        unset($fields['shipping_postcode']);
        unset($fields['shipping_country']);
        unset($fields['shipping_state']);

        unset($fields['order']['order_comments']);

        return $fields;
}
add_filter('woocommerce_checkout_fields','meal_checkout_fields');

function meal_order_status_processing($order_id){
    $order = wc_get_order($order_id);
    $reservation_id = $order->get_customer_note();
    if($reservation_id){
        $reservation = get_post($reservation_id);
        wp_update_post(array(
            'ID' => $reservation_id,
            'post_title' =>"[Paid] - ".$reservation->post_title
        ));
        add_post_meta($reservation_id,'paid',1);
    }
}
add_filter( 'woocommerce_order_status_processing','meal_order_status_processing' );