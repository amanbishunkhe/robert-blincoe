<?php

if( class_exists( 'CSF' ) ) {

  CSF::createWidget( 'tactical_add_widget', array(
    'title'       => 'Tactical Add',
    'classname'   => 'tactical-widget-add-post',
    'description' => 'Advertisement Posts',
    'fields'      => array(

      array(
        'id'      => 'add_title',
        'type'    => 'text',
        'title'   => 'Title',
      ),

      array(
        'id'      => 'add_image',
        'type'    => 'media',
        'title'   => 'Add Image',
      ),


    )
  ) );

  
  if( ! function_exists( 'tactical_add_widget' ) ) {
    function tactical_add_widget( $args, $instance ) {

      echo $args['before_widget'];
        $title                          = $instance['add_title'];
        $add_image                      = $instance['add_image'];
          
        if( is_array($add_image) && isset($add_image['url']) ){
            $add_image_url          = $add_image['url'];
            $add_image_alt          = $add_image['alt'];    
        } 
        ?>
        <aside class="add widget">
            <?php if( !empty($title ) ): ?>
            <div class="entry-header">
                <h3 class="entry-title"><?php echo $title; ?> </h3>
            </div>
            <?php endif; 

            if( !empty($add_image_url) ):
            ?>
            <figure class="featured-image single-img">
                <img src="<?php echo $add_image_url; ?>" alt="<?php echo $add_image_alt; ?>">
            </figure>
            <?php endif; ?>
        </aside>
        <?php
  
        echo $args['after_widget'];

    }
  }

}
