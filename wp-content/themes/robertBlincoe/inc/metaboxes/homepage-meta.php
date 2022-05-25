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
 * LPPS Section
 */


CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'LPPS Section',
    'icon'  => 'fa fa-envelope-o',
    'fields'=> array(
      	array(
	        'id'    => 'lpps_section_enable',
	        'type'  => 'switcher',
	        'title' => 'LPPS Section Enable'
      	),
      	array(
	        'id'    		=> 'lpss_section_title',
	        'type'  		=> 'wp_editor',
	        'title' 		=> 'Title',
	        'dependency'  	=> array('lpps_section_enable', '==', 'true'), 
      	), 

        array(
            'id'            => 'lpss_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Content',
            'dependency'    => array('lpps_section_enable', '==', 'true'), 
        ),
       
    )
  )
);

/**
 * Featured Section
 */

CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'Featured Post Section',
    'icon'  => 'fa fa-eercast',
    'fields'=> array(
        array(
            'id'    => 'featured_post_section_enable',
            'type'  => 'switcher',
            'title' => 'Featured Post Section Enable'
        ),
        array(
            'id'            => 'featured_post_section_title',
            'type'          => 'text',
            'title'         => 'Title',
            'dependency'    => array('featured_post_section_enable', '==', 'true'), 
        ),  

        array(
            'id'            => 'featured_post_section_sub_title',
            'type'          => 'wp_editor',
            'title'         => 'Sub Title',
            'dependency'    => array('featured_post_section_enable', '==', 'true'), 
        ),              

        array(
            'id'            => 'featured_post_category',
            'type'          => 'select',
            'title'         => 'Choose Category',
            'placeholder'   => 'Select a category',
            'options'       => 'categories',
            'dependency'    => array('featured_post_section_enable', '==', 'true'),
        ), 
       
    )
  )
);

/**
 * Article Section
 */

CSF::CreateSection( $homepage_page_opts, 
  array(
    'title' => 'Article Section',
    'icon'  => 'fa fa-hourglass',
    'fields'=> array(
        array(
            'id'    => 'article_section_enable',
            'type'  => 'switcher',
            'title' => 'Article Section Enable'
        ),
        array(
            'id'            => 'article_section_title',
            'type'          => 'text',
            'title'         => 'Title',
            'dependency'    => array('article_section_enable', '==', 'true'), 
        ), 

        array(
            'id'            => 'article_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Content',
            'dependency'    => array('article_section_enable', '==', 'true'), 
        ),
       
    )
  )
);

/**
 * Guide Section
 */

CSF::createSection(
  $homepage_page_opts,
  array(
    'title' => 'Guide Section',
    'icon'  => 'fa fa-ravelry',
    'fields'  => array(
        array(
            'id'          => 'guide_section_enable',
            'type'        => 'switcher',
            'title'       => 'Guide Section Enable'
        ),        
     
        array(
            'id'          => 'guide_title',
            'type'        => 'text',
            'title'       => 'Title',
            'dependency'  => array('guide_section_enable' , '==' , true),
        ),
        array(
            'id'            => 'guide_desc',
            'type'          => 'wp_editor',
            'title'         => 'Description',
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '100px',
            'dependency'    => array('guide_section_enable', '==', 'true'), 
        ),
        array(
            'id'          => 'guide_section_image',
            'type'        => 'media',
            'title'       => 'Image',
            'dependency'  => array('guide_section_enable', '==' , true),
        ),

        // array(
        //     'id'            => 'guide_form_desc',
        //     'type'          => 'wp_editor',
        //     'title'         => 'Form Description',
        //     'tinymce'       => true,
        //     'quicktags'     => true,
        //     'media_buttons' => false,
        //     'height'        => '100px',
        //     'dependency'    => array('guide_section_enable', '==', 'true'), 
        // ),

        // array(
        //     'id'          => 'guide_form_title',
        //     'type'        => 'text',
        //     'title'       => 'Form Title',
        //     'dependency'  => array('guide_section_enable' , '==' , true),
        // ),

        array(
            'id'          => 'guide_form_shortcode',
            'type'        => 'textarea',
            'title'       => 'Guide Form ID',
            'dependency'  => array('guide_section_enable' , '==' , true),
            'desc'        => 'Put the form ID from the "Thrive Dashboard"'
        ),

        array(
            'id'          => 'guide_section_bg_image',
            'type'        => 'media',
            'title'       => 'Background Image',
            'dependency'  => array('guide_section_enable', '==' , true),
        ),
      
    )
  )
);

/**
 * Preparing Section
 */
CSF::createSection(
  $homepage_page_opts,
  array(
    'title'  => 'Category Section',
    'icon'   => 'fa fa-hourglass',
    'fields' => array(
        array(
            'id'            =>  'preparing_section_check',
            'type'          =>  'switcher',
            'title'         =>  'Category Section Enable',
        ),
        array(
            'id'            =>  'preparing_section_title',
            'type'          => 'text',
            'title'         => 'Title',         
            'dependency'    => array('preparing_section_check', '==', 'true'), 
        ),
        array(
            'id'            =>  'preparing_section_content',
            'type'          => 'text',
            'title'         => 'Content',         
            'dependency'    => array('preparing_section_check', '==', 'true'), 
        ), 

        array(
            'id'              => 'preparing_categories',
            'type'            => 'checkbox',
            'title'           => 'Checkbox with Categories',
            'options'         => 'categories',
            'dependency'      => array('preparing_section_check', '==', 'true'), 
            'query_args'      => array(
                'orderby'       => 'post_title',
                'order'         => 'DESC',
            ),
        ),
          
    )
  )
);


/**
 * Access Proudly Serving
 */
// CSF::createSection(
//   $homepage_page_opts,
//   array(
//     'title'  => 'Access Proudly Serving Section',
//     'icon'   => 'fa fa-users',
//     'fields' => array(
//       array(
//           'id'            =>  'aps_section_check',
//           'type'          =>  'switcher',
//           'title'         =>  'Access Proudly Serving Section Enable',
//       ),
//       array(
//             'id'            =>  'aps_title',
//             'type'          =>  'wp_editor',
//             'title'         =>  'Title',
//             'tinymce'       => true,
//             'quicktags'     => true,
//             'media_buttons' => false,
//             'height'        => '50px',
//             'dependency'    => array('aps_section_check', '==', 'true'), 
//           ),
//       array(
//           'id'            => 'aps_description',
//           'type'          => 'wp_editor',
//           'title'         => 'Description',
//           'tinymce'       => true,
//           'quicktags'     => true,
//           'media_buttons' => false,
//           'height'        => '100px',
//           'dependency'    => array('aps_section_check', '==', 'true'), 
//         ),
//         array(
//           'id'              => 'aps_group_items',
//           'type'            => 'group',
//           'title'           => 'ASP Items',
//           'button_title'    => 'Add ASP Item',
//           'dependency'      =>  array('aps_section_check', '==' , 'true'),
//           'fields'          => array(
//               array(
//                 'id'         => 'item_title',
//                 'type'       => 'text',
//                 'title'      => 'Title'   
//               ),
//               array(
//                 'id'         => 'item_title_link',
//                 'type'       => 'text',
//                 'title'      => 'External Link'   
//               ),
//               array(
//                 'id'        => 'item_feature_image',
//                 'type'      => 'media',
//                 'title'     => 'Feature Image'
//               ),             
//               array(
//                 'id'        => 'item_logo',
//                 'type'      => 'media',
//                 'title'     => 'Logo'
//               )
//           )
//         )  
   
//     )
//   )
// );
