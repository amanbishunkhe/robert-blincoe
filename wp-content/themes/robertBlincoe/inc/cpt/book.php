<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function book_posttype() {

    $labels = array(
        'name'                => __( 'Books', 'robert-blincoe' ),
        'singular_name'       => __( 'Book', 'robert-blincoe' ),
        'add_new'             => _x( 'Add New Book', 'robert-blincoe', 'robert-blincoe' ),
        'add_new_item'        => __( 'Add New Book', 'robert-blincoe' ),
        'edit_item'           => __( 'Edit Book', 'robert-blincoe' ),
        'new_item'            => __( 'New Book', 'robert-blincoe' ),
        'view_item'           => __( 'View Book', 'robert-blincoe' ),
        'search_items'        => __( 'Search Book', 'robert-blincoe' ),
        'not_found'           => __( 'No Book found', 'robert-blincoe' ),
        'not_found_in_trash'  => __( 'No Book found in Trash', 'robert-blincoe' ),
        'parent_item_colon'   => __( 'Parent Book:', 'robert-blincoe' ),
        'menu_name'           => __( 'Books', 'robert-blincoe' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Book',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-schedule',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true, //set false to remove View btn
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => false,
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'post-formats')
    );

    register_post_type( 'book', $args );
   
}
add_action( 'init', 'book_posttype' );

function themes_taxonomy() {

  $labels = array(
    'name'                  => _x( 'Book Categories', '', 'aarambhathemes' ),
    'singular_name'         => _x( 'Book Category', '', 'aarambhathemes' ),
    'search_items'          => __( 'Search Book Categories', 'aarambhathemes' ),
    'popular_items'         => __( 'Popular Book Categories', 'aarambhathemes' ),
    'all_items'             => __( 'All Book Categories', 'aarambhathemes' ),
    'parent_item'           => __( 'Parent Book Category', 'aarambhathemes' ),
    'parent_item_colon'     => __( 'Parent Book Category', 'aarambhathemes' ),
    'edit_item'             => __( 'Edit Book Category', 'aarambhathemes' ),
    'update_item'           => __( 'Update Book Category', 'aarambhathemes' ),
    'add_new_item'          => __( 'Add New Book Category', 'aarambhathemes' ),
    'new_item_name'         => __( 'New Book Category Name', 'aarambhathemes' ),
    'add_or_remove_items'   => __( 'Add or remove Book Categories', 'aarambhathemes' ),
    'choose_from_most_used' => __( 'Choose from most used Book Categories', 'aarambhathemes' ),
    'menu_name'             => __( 'Book Category', 'aarambhathemes' ),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => false,
    'hierarchical'      => true,
    'show_tagcloud'     => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => true,
    'query_var'         => true,
    'capabilities'      => array(),
  );

  register_taxonomy( 'book_categories', array( 'book' ), $args );
}

add_action( 'init', 'themes_taxonomy' );


add_filter('manage_book_posts_columns', 'book_image');
add_action('manage_book_posts_custom_column', 'content_only_book', 15, 3);
//adding column in the listing of the At The Museums
function book_image($defaults) {
    $defaults['featured_image']         = 'Book Image';
    
    return $defaults;
}
function content_only_book($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
            echo "<img src='".$post_thumbnail_img[0]."' width='80'/>";
        }
    }
}

// set metaboxes
  $prefix = 'book_options';

  CSF::createMetabox( $prefix, array(
    'title'     => 'Book Author',
    'post_type' => 'book',
    'data_type' => 'unserialize',
    'priority'  => 'high'
  ) );


  CSF::createSection( $prefix,array(   
    'fields' =>array(
        array(
            'id'              => 'book_author',
            'type'            => 'text',               
        ),        
      ),
  ));