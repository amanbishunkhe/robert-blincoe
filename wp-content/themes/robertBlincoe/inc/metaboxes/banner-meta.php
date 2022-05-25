<?php
$home_banner_options = 'home_banner_options';

  CSF::createMetabox(
      $home_banner_options,
      array(
        'title'             =>  'Homepage Options',
        'post_type'         =>  array('page'),
        'context'           => 'normal',
        'page_templates'    => 'templates/template-homepage.php',
        'data_type'         =>  'serialize',
        'priority'          =>  'high',
      )
    );
  //slider banner

    $banner_posts_list  = array();
    $banner_post_args   = array(
      'post_type'       => 'post',
      'post_status'     => 'publish',
      'posts_per_page'  => -1,    
      'fields'          => 'ids'
    );
    $posts = get_posts($banner_post_args);
    if( is_array( $posts ) && count( $posts ) > 0 ) {
        foreach( $posts as $id ) {
            $banner_posts_list[$id] = get_the_title( $id );
        }
    }

    CSF::createSection($home_banner_options,
        array(
          'title'  => 'Banner Section',
          'icon'   => 'fa fa-diamond',
          'fields' => array(          
                array(
                  'id'          =>  'banner_check',
                  'type'        =>  'switcher',
                  'title'       =>  'Banner Enable',          
                ),

                array(
                    'id'         => 'banner_post_id_list',
                    'type'       => 'checkbox',
                    'title'      => 'Select List Of Posts For Banner SLider ',
                    'options'    => $banner_posts_list,
                    'dependency' => array('banner_check', '==', 'true'),
                    'desc'       => 'Above List is From Post Type.'
                ), 


            )
        )
    );


    /**
     * categories images
     */


  $category_options = 'category_options';
  CSF::createTaxonomyOptions( $category_options, array(
    'taxonomy'  => 'category',
    'data_type' => 'serialize', 
  ) );
  CSF::createSection( $category_options, array(
    'fields' => array(

      array(
        'id'    => 'cat_featured_image',
        'type'  => 'media',
        'title' => 'Category Featured Image',
      ),

      array(
        'id'    => 'cat_logo',
        'type'  => 'media',
        'title' => 'Cateogry Logo',
      ),

    )
  ) );