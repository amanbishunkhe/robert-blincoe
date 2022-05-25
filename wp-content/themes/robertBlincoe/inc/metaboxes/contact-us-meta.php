<?php
$contact_us_page_opts = 'contact_us_page_options';

CSF::createMetabox( $contact_us_page_opts, array(
  'title'           => 'Contact Us Page Other Contents',
  'post_type'       => 'page',
  'page_templates'  => 'templates/contact-us.php',
  'data_type'       => 'serialize',  
  'priority'        => 'high',
) );

/**
 * Contact Us Section
 */


CSF::CreateSection( $contact_us_page_opts, 
  array(
    'title' => 'Contact Us Section',
    'icon'  => 'fa fa-envelope-o',
    'fields'=> array(
      	array(
	        'id'    => 'contact_us_section_enable',
	        'type'  => 'switcher',
	        'title' => 'Contact Us Section Enable'
      	),     

      	array(
	        'id'    		=> 'contact_us_section_title',
	        'type'  		=> 'text',
	        'title' 		=> 'Title',
	        'dependency'  	=> array('contact_us_section_enable', '==', 'true'), 
      	),
      	array(
            'id'            => 'contact_us_section_content',
            'type'          => 'wp_editor',
            'title'         => 'Info',
            'dependency'    => array('contact_us_section_enable', '==', 'true'), 
        ),  
       
    )
  )
);

/**
 * Form Section
 */

CSF::CreateSection( $contact_us_page_opts, 
  	array(
	    'title' => 'Form Section',
	    'icon'  => 'fa fa-hourglass',
	    'fields'=> array(
	        array(
	            'id'    => 'form_section_enable',
	            'type'  => 'switcher',
	            'title' => 'Form Section Enable'
	        ),
	        array(
	            'id'            => 'form_section_title',
	            'type'          => 'text',
	            'title'         => 'Title',
	            'dependency'    => array('form_section_enable', '==', 'true'), 
	        ), 

	        array(
	            'id'            => 'form_shortcode',
	            'type'          => 'textarea',
	            'title'         => 'Form Shortcode',
	            'desc'			=> 'Paste form shortcode here',
	            'dependency'    => array('form_section_enable', '==', 'true'), 
	        ),
	       
	    )
  	)
);

/**
 * Contact Section
 */

CSF::CreateSection( $contact_us_page_opts, 
  	array(
	    'title' => 'Contact Section',
	    'icon'  => 'fa fa-ravelry',
	    'fields'=> array(
	        array(
	            'id'    => 'contact_section_enable',
	            'type'  => 'switcher',
	            'title' => 'Contact Section Enable'
	        ),
	        array(
	            'id'            => 'contact_section_title',
	            'type'          => 'text',
	            'title'         => 'Title',
	            'dependency'    => array('contact_section_enable', '==', 'true'), 
	        ), 	 

	        array(
	            'id'            => 'contact_section_desc',
	            'type'          => 'wp_editor',
	            'title'         => 'Description',
	            'dependency'    => array('contact_section_enable', '==', 'true'), 
	        ),  

	        //email

	        array(
	            'id'    		=> 'contact_email_section_enable',
	            'type'  		=> 'switcher',
	            'title' 		=> 'Email Section Enable'
	        ),
	        array(
	            'id'            => 'contact_email_section_title',
	            'type'          => 'text',
	            'title'         => 'Title Text',
	            'dependency'    => array('contact_email_section_enable', '==', 'true'), 
	        ), 	

	        array(
	            'id'            => 'contact_email',
	            'type'          => 'text',
	            'title'         => 'Email Address',
	            'dependency'    => array('contact_email_section_enable', '==', 'true'), 
	        ), 	

	        //Social Links

	        array(
	            'id'    		=> 'contact_social_link_section_enable',
	            'type'  		=> 'switcher',
	            'title' 		=> 'Social Link Section Enable'
	        ),
	        array(
	            'id'            => 'contact_social_link_title',
	            'type'          => 'text',
	            'title'         => 'Title Text',
	            'dependency'    => array('contact_social_link_section_enable', '==', 'true'), 
	        ), 	

	        array(
	          	'id'              => 'contact_social_link_group_items',
	          	'type'            => 'group',
	          	'title'           => 'Link Items',
	          	'button_title'    => 'Add Link Item',
	          	'dependency'      =>  array('contact_social_link_section_enable', '==' , 'true'),
	          	'fields'          => array(
	              	array(
	                	'id'         => 'item_title',
	                	'type'       => 'text',
	                	'title'      => 'Title'   
	              	),
	              	array(
	                	'id'         => 'item_link',
	                	'type'       => 'text',
	                	'title'      => 'External Link'   
	              	),		             
          		)
	        ),

	        //mailing adddress

	        array(
	            'id'    		=> 'contact_mailing_address_section_enable',
	            'type'  		=> 'switcher',
	            'title' 		=> 'Mailing Section Enable'
	        ),
	        array(
	            'id'            => 'contact_mailing_address_section_title',
	            'type'          => 'text',
	            'title'         => 'Title Text',
	            'dependency'    => array('contact_mailing_address_section_enable', '==', 'true'), 
	        ), 	

	        array(
	            'id'            => 'contact_mailing_address',
	            'type'          => 'textarea',
	            'title'         => 'Mailing Address',
	            'dependency'    => array('contact_mailing_address_section_enable', '==', 'true'), 
	        ), 	
	       
	    )
  	)
);

