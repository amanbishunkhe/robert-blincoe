<?php

  /**
   * reveiw post type
   */

    $reveiw_options = 'reveiw_options';

    CSF::createMetabox(
      $reveiw_options,
      array(
        'title'             =>  'Reveiw Options',
        'post_type'         =>  array('post'),
        'context'           => 'normal',
        'page_templates'    => 'templates/reviews.php',
        'data_type'         =>  'serialize',
        'priority'          =>  'high',
      )
    );


    CSF::createSection($reveiw_options,
        array(
        //  'title'  => 'Review Options',
        //  'icon'   => 'fa fa-diamond',
          'fields' => array(          
                array(
                  'id'          =>  'review_product_table_enable',
                  'type'        =>  'switcher',
                  'title'       =>  'Review Product Table Enable',          
                ),

                array(
                  'id'              => 'review_product_group_items',
                  'type'            => 'group',
                  'title'           => 'Multiple Reviews',
                  'button_title'    => 'Add New Product',
                  'dependency'      =>  array('review_product_table_enable', '==' , 'true'),
                  'max'             => 6,
                  'fields'          => array(
                        array(
                            'id'        => 'item_title',
                            'type'      => 'text',
                            'title'     => 'Title'   
                        ),
                        array(
                            'id'            => 'item_description',
                            'type'          => 'wp_editor',
                            'title'         => 'Short Description',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ), 
                        array(
                            'id'        => 'item_image',
                            'type'      => 'media',
                            'title'     => 'Image'
                        ), 
                        array(
                            'id'            => 'item_features',
                            'type'          => 'wp_editor',
                            'title'         => 'Features',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',  
                        ),                                  
                        array(
                            'id'            => 'item_pros',
                            'type'          => 'wp_editor',
                            'title'         => 'Pros',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ),
                        array(
                            'id'            => 'item_cons',
                            'type'          => 'wp_editor',
                            'title'         => 'Cons',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ),
                        array(
                            'id'            => 'item_star_rating',
                            'type'          => 'number',
                            'title'         => 'Star Rating',
                            'default'       => 5,
                            'desc'          => 'How many stars out of 5 ?',

                        ),
                        array(
                            'id'        => 'item_buy_btn_text',
                            'type'      => 'text',
                            'title'     => 'Button Label'   
                        ),
                        array(
                            'id'        => 'item_buy_btn_url',
                            'type'      => 'text',
                            'title'     => 'Button URL'   
                        ),
                      
                        array(
                            'id'            => 'item_content',
                            'type'          => 'wp_editor',
                            'title'         => 'Content',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => true,
                            'height'        => '300px',  
                        ), 

                    )
                ),

                array(
                  'id'              => 'single_review_product_group_items',
                  'type'            => 'group',
                  'title'           => 'Single Reviews',
                  'button_title'    => 'Add New Product',
                  'dependency'      =>  array('review_product_table_enable', '==' , 'true'),
                  'max'             => 6,
                  'fields'          => array(
                        array(
                            'id'        => 'item_title',
                            'type'      => 'text',
                            'title'     => 'Title'   
                        ),
                        array(
                            'id'            => 'item_description',
                            'type'          => 'wp_editor',
                            'title'         => 'Short Description',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ), 
                        array(
                            'id'        => 'item_image',
                            'type'      => 'media',
                            'title'     => 'Image'
                        ), 
                        array(
                            'id'            => 'item_features',
                            'type'          => 'wp_editor',
                            'title'         => 'Features',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',  
                        ),                                  
                        array(
                            'id'            => 'item_pros',
                            'type'          => 'wp_editor',
                            'title'         => 'Pros',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ),
                        array(
                            'id'            => 'item_cons',
                            'type'          => 'wp_editor',
                            'title'         => 'Cons',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => false,
                            'height'        => '100px',
                        ),
                        array(
                            'id'            => 'item_star_rating',
                            'type'          => 'number',
                            'title'         => 'Star Rating',
                            'default'       => 5,
                            'desc'          => 'How many stars out of 5 ?',

                        ),
                        
                        array(
                            'id'        => 'item_buy_btn_text',
                            'type'      => 'text',
                            'title'     => 'Button Label'   
                        ),
                        array(
                            'id'        => 'item_buy_btn_url',
                            'type'      => 'text',
                            'title'     => 'Button URL'   
                        ),
                      
                        array(
                            'id'            => 'item_content',
                            'type'          => 'wp_editor',
                            'title'         => 'Content',
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => true,
                            'height'        => '300px',  
                        ), 

                    )
                )

            )
        )
    );