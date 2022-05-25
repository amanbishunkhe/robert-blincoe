<?php
if( class_exists( 'CSF' ) ) {
  
    CSF::createWidget( 'tactical_featured_post', array(
        'title'       => 'Tactical Featured Post',
        'classname'   => 'tactical-widget-featured-post',
        'description' => 'Related Posts',
        'fields'      => array(
            array(
                'id'      => 'title',
                'type'    => 'text',
                'title'   => 'Title',
            ),
            array(
                'id'      => 'num_of_posts',
                'type'    => 'number',
                'title'   => 'Number Of Posts',
                'default' => '3'
            ),

        )
    ) );

 
    if( ! function_exists( 'tactical_featured_post' ) ) {
        function tactical_featured_post( $args, $instance ) {

        echo $args['before_widget'];
           
            $title          = $instance['title']; 
            $num_of_posts   = $instance['num_of_posts'];  

            $featured_post_args = array(
                'post_type'           => 'post',
                'posts_per_page'      => $num_of_posts,
                'orderby'             => 'DATE',
                'order'               => 'DESC',
                'category_name'       => 'featured',
                'post__not_in'        => array(get_the_ID()),
            );
            $featured_post_query = new WP_Query( $featured_post_args );      
            ?>
            <aside class="featured-post widget">
                <?php
                if( $featured_post_query->have_posts()){
                ?>
                <div class="entry-header">
                    <h3 class="entry-title"><?php echo $title ?></h3>
                </div>
                <?php            
                    while( $featured_post_query->have_posts())
                    {
                       $featured_post_query->the_post();
                       $post_categories = wp_get_post_categories( get_the_ID() );
                       ?>
                       <article class="post">
                            <?php if( has_post_thumbnail() ):
                                $featured_image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-articles',false);
                                $featured_img= esc_url( $featured_image_url[0]);

                                $featured_image_id = get_post_thumbnail_id();

                                $featured_image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', TRUE);
                                ?>
                            <figure class="featured-image">
                                 <img src="<?php echo $featured_img; ?>" alt="<?php echo $featured_image_alt; ?>">
                            </figure>
                            <?php endif; ?>
                            <div class="post-content">
                                <div class="entry-meta">
                                    <div class="cat-links">
                                        <?php
                                        foreach ($post_categories as $key => $value) {
                                            $category_name = get_the_category_by_ID( $value);
                                            $category_link =  get_category_link( $value );
                                            ?> 
                                                <a href="<?php echo $category_link ;?>" rel="category tag"><?php echo $category_name ;?></a>  
                                            <?php
                                        }
                                        ?>                                   
                                    </div>
                                </div>
                                <!--.entry-meta-->
                                <div class="entry-header">
                                    <h4 class="entry-title">
                                        <a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a>
                                    </h4>
                                </div>
                                <div class="view-more">
                                    <a href="<?php the_permalink( ); ?>">Read more</a>
                                </div>
                            </div>
                        </article>
                       <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </aside>
            <!--.featured-post-->
        <?php 
        echo $args['after_widget'];

        }
    }

}
