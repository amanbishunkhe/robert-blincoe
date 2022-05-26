<?php
$homepage_page_opts = 'homepage_options';

CSF::createMetabox( $homepage_page_opts, array(
  'title'           => 'Homepage Other Contents',
  'post_type'       => 'page',
  'page_templates'  => 'templates/template-homepage.php',
  'data_type'       => 'serialize',  
  'priority'        => 'high',
) );

/**
 * About Me Section
 */

CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'About Me Section',
    'icon'  => 'fa fa-eercast',
    'fields'=> array(
      	array(
	        'id'    => 'about_me_section_enable',
	        'type'  => 'switcher',
	        'title' => 'About Me Section Enable'
      	),
      	array(
	        'id'    		=> 'about_me_section_title',
	        'type'  		=> 'text',
	        'title' 		=> 'Title',
	        'dependency'  	=> array('about_me_section_enable', '==', 'true'), 
      	), 

        array(
            'id'            => 'about_me_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Content',
            'dependency'    => array('about_me_section_enable', '==', 'true'), 
        ),

        array(
            'id'            => 'about_me_section_btn_text',
            'type'          => 'text',
            'title'         => 'External Link Text',
            'dependency'    => array('about_me_section_enable', '==', 'true'), 
        ),

        array(
            'id'            => 'about_me_section_btn_url',
            'type'          => 'text',
            'title'         => 'External Link URL',
            'dependency'    => array('about_me_section_enable', '==', 'true'), 
        ), 
       
    )
  )
);

/**
 * Latest Articles
 */

CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'Latest Articles Section',
    'icon'  => 'fa fa-envelope-o',
    'fields'=> array(
        array(
            'id'              => 'latest_article_section_enable',
            'type'            => 'switcher',
            'title'           => 'Latest Articles Section Enable'
        ),
        array(
          'id'              => 'latest_article_section_title',
          'type'            => 'text',
          'title'           => 'Title',
          'dependency'      => array('latest_article_section_enable', '==', 'true'), 
        ), 

        array(
            'id'            => 'latest_article_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Content',
            'dependency'    => array('latest_article_section_enable', '==', 'true'), 
        ),

        array(
            'id'              => 'latest_article_section_link_text',
            'type'            => 'text',
            'title'           => 'Link Text',
            'dependency'      => array('latest_article_section_enable', '==', 'true'), 
        ), 
       
    )
  )
);

/**
 * Subscribe Section
 */
CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'Subscribe Section',
    'icon'  => 'fa fa-align-justify',
    'fields'=> array(
        array(
            'id'        => 'subscribe_section_enable',
            'type'      => 'switcher',
            'title'     => 'Subscribe Section Enable'
        ),
        array(
          'id'              => 'subscribe_section_title',
          'type'            => 'text',
          'title'           => 'Title',
          'dependency'      => array('subscribe_section_enable', '==', 'true'), 
        ), 

        array(
            'id'            => 'subscribe_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Content',
            'dependency'    => array('subscribe_section_enable', '==', 'true'), 
        ),

        array(
            'id'              => 'subscribe_section_shortcode',
            'type'            => 'textarea',
            'title'           => 'Form Shortcode',
            'dependency'      => array('subscribe_section_enable', '==', 'true'), 
        ), 
       
    )
  )
);