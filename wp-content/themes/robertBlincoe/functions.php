<?php
// Silence is golden.

/* tactical theme supports */
if(!function_exists( 'tactical_theme_supports' ) ):

  function tactical_theme_supports(){
    // for rss feeds in header
    add_theme_support( 'automatic-feed-links' );
    //generates the title tag
    add_theme_support( 'title-tag' );
    // support for the post thumbnails for posts and pages
    add_theme_support( 'post-thumbnails' );
    // menu for theme
    add_theme_support('menus');

    add_theme_support( 'custom-logo' );

    //registering the menus for the theme
    register_nav_menus( array(
          'primary'                   => __( 'Primary Menu' ),    
          'privacy'                   => __( 'Privacy Menu' ), 
      ) );

    /*=======================================
    =            thumbnail sizes            =
    =======================================*/

      add_image_size( 'banner-image',1665,551, true );
      add_image_size( 'latest-articles',358,239, true );
      add_image_size( 'review-image',150,100, true );
      add_image_size( 'cat-banner-image',1351,207, true );
       add_image_size( 'cat-featured-image',270,390, true );
      add_image_size( 'single-banner-image',1351,243, true );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

  }
add_action( 'after_setup_theme','tactical_theme_supports' );
endif;
/* End of tactical theme supports */
/**
 * Implementing frontend Scripts and Styles used in the theme
 */
function tactical_scripts_and_styles()
{ 
  //adding google fonts

  wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap', array(), 1.1, 'all');  

  //styles
  // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), 1.1, 'all');
 wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css', array(), 1.1, 'all');
 
  // wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), 1.1, 'all');
  // wp_enqueue_style('slick-theme','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick-theme.min.css', array(), 1.1, 'all');

  // wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), 1.1, 'all');
  // wp_enqueue_style('slick','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.css', array(), 1.1, 'all');

  // wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), 1.1, 'all');
  // wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), 1.1, 'all');

  wp_enqueue_style('meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), 1.1, 'all');  
  wp_enqueue_style('main-css', get_stylesheet_uri(), array(), time(), 'all');
  wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), time() , 'all');



  //scripts   

  // wp_enqueue_script('jquery-toc', get_template_directory_uri() . '/assets/js/jquery.toc.js', array('jquery'), 1.0, true);
  // wp_enqueue_script('jquery-ui-custom', get_template_directory_uri() . '/assets/js/jquery-ui-1.9.1.custom.min.js', array('jquery'), 1.0, true);

  // wp_enqueue_script('jquery-ui-custom', 'http://code.jquery.com/jquery-1.9.1.js', array('jquery'), 1.0, true);
// 
  wp_enqueue_script('jquery-ui-custom', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js', array('jquery'), 1.0, true);
  wp_enqueue_script('jquery-tocify', get_template_directory_uri() . '/assets/js/jquery.tocify.js', array('jquery'), 1.0, true);


  // wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array(), 1.0, true);
  wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js', array(), 1.0, true);
  
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 1.0, true);
  // wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js', array(), 1.1, 'all');
  //wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), 1.0, true);

  wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array('jquery'), 1.0, true);  
  wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), 1.0, true);

}
add_action('wp_enqueue_scripts', 'tactical_scripts_and_styles');



require get_template_directory() . '/inc/init.php';


function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');



add_filter( 'comment_form_fields', 'tactical_comment_fields_custom_order' );
function tactical_comment_fields_custom_order( $fields ) {  
    
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;  
    $fields['comment'] = $comment_field;
   
    // done ordering, now return the fields:
    return $fields;
}

/**
 * Register Widget
 */
add_action( 'widgets_init', 'rws_register_sidebars' );
function rws_register_sidebars() {

  // Featured sidebar
    register_sidebar(array(
      'name' => 'Sidebar Widget ',
      'id' => 'sidebar-widget',
      'description' => 'Widgets in this area will be shown on Single Sidebar Post',
        'before_widget' => '<aside id="%1$s" class="featured-post widget" >',
        'after_widget'  => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

      // Featured sidebar
    register_sidebar(array(
      'name' => 'Review Sidebar Widget ',
      'id' => 'review-sidebar-widget',
      'description' => 'Widgets in this area will be shown on Reveiew Single Sidebar Post',
        'before_widget' => '<aside id="%1$s" class="featured-post widget" >',
        'after_widget'  => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}

/**
 * Recaptcha issue
 */

function disable_tactical_recaptcha(){
    if( !is_page( '6572' ) ){
        wp_dequeue_script( 'google-recaptcha' );
        wp_dequeue_script( 'wpcf7-recaptcha' );
    }
}
add_action('wp_enqueue_scripts', 'disable_tactical_recaptcha' , 9999 );