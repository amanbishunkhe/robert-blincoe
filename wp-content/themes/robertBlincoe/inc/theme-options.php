<?php
if ( ! defined('ABSPATH')) {die;}
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'theme_options';

  /**
   *
   * @menu_parent argument examples.
   *
   * For Dashboard: 'index.php'
   * For Posts: 'edit.php'
   * For Media: 'upload.php'
   * For Pages: 'edit.php?post_type=page'
   * For Comments: 'edit-comments.php'
   * For Custom Post Types: 'edit.php?post_type=your_post_type'
   * For Appearance: 'themes.php'
   * For Plugins: 'plugins.php'
   * For Users: 'users.php'
   * For Tools: 'tools.php'
   * For Settings: 'options-general.php'
   *
   */
  CSF::createOptions( $prefix, array(
    'menu_title'              => 'Theme Options',
    'menu_slug'               => 'theme-options',
    'menu_type'               => 'submenu',
    'menu_parent'             => 'themes.php',
    'framework_title'         => 'Theme Options <small>by Rigorous Web Services</small>',
    'show_reset_all'          => false,
    'show_reset_section'      => false,
    'theme'                   => 'dark'
  ) );


  /**
   * General Setting options
   */    
  CSF::createSection( $prefix, array(    
    'title'             => 'General Settings',
    'icon'              => 'fa fa-cogs',
    'fields'            => array(

      array(
        'id'            =>  'copyright_switcher',
        'type'          =>  'switcher',
        'title'         =>  'Copyright Enable',
      ),
      array(
        'id'            =>  'copyright_text',
        'type'          =>  'textarea',
        'title'         =>  'Copyright Text',
        'sanitize'      => false,
        'dependency'    => array('copyright_switcher', '==', 'true'),
      ),          
    )
  ));

  /**
   * Top Header options
   */
    
  CSF::createSection( $prefix, array(    
    'title'             => 'Top Header Section',
    'icon'              => 'fa fa-eercast',
    'fields'            => array(
        array(
          'id'        =>'top_header_social_link_enable',
          'type'      =>'switcher',
          'title'     =>'Top header Social Link Enable' 
        ),        

        array(
            'id'        =>'top_header_subbscribe_btn_text',
            'type'      =>'text',
            'title'     =>'Subscribe text' 
        ),
        array(
            'id'        =>'top_header_subbscribe_shortcode',
            'type'      =>'text',
            'title'     =>'Subscribe Form ID',
            'desc'      => 'Put the form ID from the "Thrive Dashboard"' 
        )

    )
  ));

  /**
   * Footer Section
   */
  CSF::createSection( $prefix, array(    
    'title'             => 'Footer Section',
    'icon'              => 'fa fa-diamond',
    'fields'            => array(
        array(
          'id'          =>  'footer_sec_enable',
          'type'        =>  'switcher',
          'title'       =>  'Footer Section Enable' 
        ),
        array(
          'id'            =>  'footer_logo',
          'type'          =>  'media',
          'title'         =>  'Logo',
          'dependency'    =>  array('footer_sec_enable', '==', 'true'),
        ),
        array(
            'id'            => 'footer_section_desc',
            'type'          => 'wp_editor',
            'title'         => 'Description',
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => true,
            'height'        => '100px',       
            'dependency'    => array('footer_sec_enable', '==', 'true'), 
        ), 

        array(
          'id'            =>  'footer_subscribe_form_title',
          'type'          =>  'text',
          'title'         =>  'Subscribe Form Title',
          'dependency'    => array('footer_sec_enable', '==', 'true'), 
        ),

        array(
            'id'            => 'footer_subscribe_form_desc',
            'type'          => 'wp_editor',
            'title'         => 'Form Description',
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => true,
            'height'        => '100px',       
            'dependency'    => array('footer_sec_enable', '==', 'true'), 
        ), 

        array(
            'id'            => 'footer_section_subscribe_form',
            'type'          => 'textarea',
            'title'         => 'Subscribe Form Shortcode',
            'dependency'    => array('footer_sec_enable', '==', 'true'), 
            'desc'          => 'Put the form ID from the "Thrive Dashboard"' 
        ), 
        array(
          'id'          =>  'footer_social_links_enable',
          'type'        =>  'switcher',
          'title'       =>  'Social Link Enable',
          'dependency'    => array('footer_sec_enable', '==', 'true'), 
        ),
    )
  ));


  /**
   * Global Banner 
   */
  CSF::createSection( $prefix, array(    
    'title'             => 'Global Section',
    'icon'              => 'fa fa-shield',
    'fields'            => array(
        array(
          'id'        =>'global_banner_image',
          'type'      =>'media',
          'title'     =>'Global Banner Image' 
        ),
        array(
            'id'            => 'social_group',
            'type'          => 'group',
            'title'         => 'Social Link Items',
            'fields'        => array(
                array(
                    'id'          => 'social_item_title',
                    'type'        => 'text',
                    'title'       => 'Title',
                ),                
                array(
                    'id'          => 'social_item_external_link',
                    'type'        => 'text',
                    'title'       => 'External Link',
                ),             
               
            ),
        ),
    )
  ));

    /**
   * Single page Notice section
   */
  CSF::createSection( $prefix, array(    
    'title'             => 'Single Post Notice Section',
    'icon'              => 'fa fa-crosshairs',
    'fields'            => array(
        array(
          'id'          =>  'notice_sec_enable',
          'type'        =>  'switcher',
          'title'       =>  'Notice Section Enable',          
        ),

        array(
              'id'    => 'post_notice_title',
              'type'  => 'text',
              'title' => 'Title',
              'dependency'    => array('notice_sec_enable', '==', 'true'),
        ),

        array(
              'id'    => 'post_notice',
              'type'  => 'wp_editor',
              'title' => 'Content',
              'dependency'    => array('notice_sec_enable', '==', 'true'),
        ),       
    )
  ));


}