<?php
/*
Template Name: Homepage Template
*/
get_header();
$home_banner_options = get_post_meta( get_the_ID() , 'home_banner_options', true );              
$banner_check           = $home_banner_options['banner_check'];
$banner_post_id_list    = $home_banner_options['banner_post_id_list'];

if( $banner_check == 1 ):?>
<section class="featured-slider-section">
    <div class="featured-slider">
        <?php
            $banner_posts_args  = array(
                'post_type'       => 'post',
                'post__in'        => $banner_post_id_list,   
                'post_status'     => 'publish',
            );
            $banner_posts_query       = new WP_Query( $banner_posts_args );
      
            if( $banner_posts_query->have_posts()){
                while( $banner_posts_query->have_posts())
                {
                   $banner_posts_query->the_post();
                   $post_categories = wp_get_post_categories( get_the_ID() );
                   ?>
                    <div class="slider-item">
                        <?php if( has_post_thumbnail() ):
                            // $banner_image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'banner-image',false);
                            // $banner_img= esc_url( $banner_image_url[0]);
                            // $banner_image_id = get_post_thumbnail_id();
                            // $banner_image_alt = get_post_meta($banner_image_id, '_wp_attachment_image_alt', TRUE);
                            ?>
                            <figure class="slider-image">
                                <!-- <img src="<?php echo $banner_img; ?>" alt="<?php echo $banner_image_alt; ?>"> -->
                                <?php the_post_thumbnail( 'banner-image', array( 'loading' => 'eager' ) ); ?>
                            </figure>
                        <?php endif; ?>
                        <div class="slider-text-wrap">
                          <div class="slider-text">
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
                                <div class="entry-header">
                                    <div class="entry-title">
                                        <h2 class="slider-title"><a href="<?php the_permalink( ); ?>"><?php the_title();?></a> </h2>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                   <?php
                }
               wp_reset_postdata();
            }
        ?>
    </div>
</section>
<!-- featured slider -->
<?php endif; ?>
   <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                $homepage_options = get_post_meta( get_the_ID() , 'homepage_options', true );
               
                $lpps_section_enable    = $homepage_options['lpps_section_enable'];
                $lpss_section_title     = $homepage_options['lpss_section_title'];
                $lpss_section_content   = $homepage_options['lpss_section_content'];
                if( $lpps_section_enable == 1 ):
                ?>
                <section class="learn-plan">
                    <div class="container">
                        <div class="entry-header heading">
                            <?php if( !empty($lpss_section_title ) ): ?>
                            <h2 class="entry-title">
                                <?php echo $lpss_section_title; ?>
                            </h2>
                            <?php endif; 
                            echo wpautop( $lpss_section_content );
                            ?>                            
                        </div>
                    </div>
                </section>
                <?php endif; 

                $featured_post_section_enable  = $homepage_options['featured_post_section_enable'];
                $featured_post_section_title   = $homepage_options['featured_post_section_title'];
                $featured_post_section_sub_title = $homepage_options['featured_post_section_sub_title'];
                $featured_post_category         = $homepage_options['featured_post_category'];

                if( $featured_post_section_enable == 1 ):
                ?>
                <section class=" featured-post latest-article">
                    <div class="container">
                        <div class="entry-header heading">
                            <?php if( !empty($featured_post_section_title ) ): ?>
                            <h2 class="entry-title"><?php echo $featured_post_section_title; ?></h2>
                            <?php endif; 
                             echo wpautop( $featured_post_section_sub_title );
                            ?>                            
                        </div>
                        <div class="post-wrapper">
                            <?php                           
                            $featured_article_args  = array(
                                'post_type'         => 'post',  
                                'post_status'       => 'publish',
                                'category__in'          => $featured_post_category,
                                'posts_per_page'        => 6,
                                'orderby'               => 'date',
                                'order'                 => 'DESC',
                            );
                            $featured_article_query       = new WP_Query( $featured_article_args );
                      
                            if( $featured_article_query->have_posts()){
                                while( $featured_article_query->have_posts())
                                {
                                   $featured_article_query->the_post();
                                   $post_categories = wp_get_post_categories( get_the_ID() );
                                   ?>
                                    <article class="post">
                                        <?php if( has_post_thumbnail( get_the_ID() ) ):
                                           
                                            $image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-articles',false);
                                            $img= esc_url( $image_url[0]);

                                            ?>
                                            <figure class="featured-image test">
                                               <img src="<?php echo $img; ?>" alt="">
                                            </figure>
                                        <?php endif; ?>

                                        <div class="post-content">
                                            <div class="entry-meta">
                                                <div class="cat-links">
                                                    <?php
                                                    foreach ($post_categories as $key => $value) {
                                                        $category_name = get_the_category_by_ID( $value);
                                                        $category_link =  get_category_link( $value );
                                                        if( $category_name != 'Featured' ):
                                                        ?>
                                                        <a href="<?php echo $category_link; ?>" rel="category tag"><?php echo $category_name; ?></a>        
                                                        <?php
                                                        endif;
                                                    }
                                                    ?>  
                                                </div>
                                            </div>
                                            <!--.entry-meta-->
                                            <div class="entry-header">
                                                <h4 class="entry-title">
                                                    <a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                        <!--     <div class="view-more">
                                                <a href="<?php the_permalink( ); ?>">Read more</a>
                                            </div> -->
                                        </div>

                                    </article>
                                   <?php
                                }
                                wp_reset_postdata();
                            }
                            ?>                          
                        </div>
                    </div>
                </section>  
                <?php
                endif;

                $article_section_enable     = $homepage_options['article_section_enable'];
                $article_section_title      = $homepage_options['article_section_title'];
                $article_section_content    = $homepage_options['article_section_content'];
                if( $article_section_enable == 1 ):
                ?>
                <section class="home-latest-article latest-article">
                    <div class="container">
                        <div class="entry-header heading">
                            <?php if( !empty($article_section_title ) ): ?>
                            <h2 class="entry-title"><?php echo $article_section_title; ?></h2>
                            <?php endif; 
                                echo wpautop( $article_section_content );
                            ?>                            
                        </div>
                        <div class="post-wrapper">
                            <?php                           
                            $latest_article_args  = array(
                                'post_type'         => 'post',  
                                'post_status'       => 'publish',
                                'posts_per_page'    => 6,
                                'orderby'           => 'date',
                                'order'             => 'DESC',
                            );
                            $latest_article_query       = new WP_Query( $latest_article_args );
                      
                            if( $latest_article_query->have_posts()){
                                while( $latest_article_query->have_posts())
                                {
                                   $latest_article_query->the_post();
                                   $post_categories = wp_get_post_categories( get_the_ID() );
                                   $post_id = get_the_ID();
                                   ?>
                                    <article class="post">
                                        <?php if( has_post_thumbnail() ):
                                            $image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-articles',false);
                                            $img= esc_url( $image_url[0]);

                                            $image_id = get_post_thumbnail_id();

                                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                            ?>
                                            <figure class="featured-image test">
                                               <img src="<?php echo $img; ?>" alt="<?php echo $image_alt; ?>">
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
                                                        <a href="<?php echo $category_link; ?>" rel="category tag"><?php echo $category_name; ?></a>        
                                                        <?php
                                                    }
                                                    ?>  
                                                </div>
                                            </div>
                                            <!--.entry-meta-->
                                            <div class="entry-header">
                                                <h4 class="entry-title">
                                                    <a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                            <!-- <div class="view-more">
                                                <a href="<?php // the_permalink( ); ?>">Read more</a>
                                            </div> -->
                                        </div>

                                    </article>
                                   <?php
                                }
                                wp_reset_postdata();
                            }
                            ?>                          
                        </div>
                    </div>
                </section>
                <?php endif; 

                $guide_section_enable       = $homepage_options['guide_section_enable'];
                $guide_title                = $homepage_options['guide_title'];
                $guide_desc                 = $homepage_options['guide_desc'];
                $guide_section_image        = $homepage_options['guide_section_image'];
                if( is_array($guide_section_image ) && isset($guide_section_image ) ){
                    $guide_section_image_url = $guide_section_image['url'];
                    $guide_section_image_alt = $guide_section_image['alt'];
                }
                // $guide_form_desc            = $homepage_options['guide_form_desc'];
                // $guide_form_title           = $homepage_options['guide_form_title'];
                $guide_form_shortcode       = $homepage_options['guide_form_shortcode'];
                $guide_section_bg_image     = $homepage_options['guide_section_bg_image'];
                if( is_array($guide_section_bg_image ) && isset($guide_section_bg_image )){
                    $guide_section_bg_image_url = $guide_section_bg_image['url'];
                }
                if( $guide_section_enable == 1 ):
                ?>
                <section class="disaster" style="background: url(<?php echo $guide_section_bg_image_url ?>); background-repeat: no-repeat; background-size:cover;">
                    <div class="container">
                        <div class="entry-header heading">
                            <?php if( !empty($guide_title ) ): ?>
                            <h2 class="entry-title"><?php echo $guide_title; ?></h2>
                            <?php endif; 
                            echo wpautop( $guide_desc );
                            ?>
                        </div>
                        <div class="disasater-wrapper">
                            <?php if( !empty($guide_section_image_url ) ): ?>
                            <figure class="featured-image">
                                <img src="<?php echo $guide_section_image_url; ?>" alt="<?php echo $guide_section_image_alt; ?>">
                            </figure>
                            <?php endif; ?>
                            <div class="form-field">
                               <?php if (function_exists('tve_leads_form_display')) { tve_leads_form_display(0, $guide_form_shortcode); } ?>
                            </div>
                        </div>
                    </div>
                </section>

                
                <?php
                endif;

                $preparing_section_check        = $homepage_options['preparing_section_check'];
                $preparing_section_title        = $homepage_options['preparing_section_title'];
                $preparing_section_content      = $homepage_options['preparing_section_content'];
                $preparing_categories           = $homepage_options['preparing_categories'];
                if( $preparing_section_check == 1 ):
                ?>
                <section class="prepping">
                    <div class="container">
                        <div class="entry-header heading">
                            <?php if( !empty($preparing_section_title) ): ?>
                            <h2 class="entry-title">
                                <?php echo $preparing_section_title; ?>
                            </h2>
                            <?php endif; 
                            echo wpautop( $preparing_section_content );
                            ?>
                        </div>
                        <div class="category-wrapper">
                            <?php  
                            if(is_array($preparing_categories) && !empty($preparing_categories) ){
                                foreach ($preparing_categories as $category) {

                                    $cat_id             = $category;
                                    $category_options   = get_term_meta( $cat_id, 'category_options', true );
                                    $category_name      = get_cat_name( $cat_id );
                                    $category_link      = get_category_link( $cat_id );

                                    if( isset($category_options['cat_featured_image']['id']) ){

                                        $cat_featured_image_id  = $category_options['cat_featured_image']['id'];
                                        $cat_featured_image_url = tactical_image_src(array('id'=> $cat_featured_image_id , 'size'=> 'cat-featured-image'));
                                        $cat_featured_image_alt = $category_options['cat_featured_image']['alt'];
                                    }
                                    else{
                                        $cat_featured_image_url = get_template_directory_uri().'/assets/images/default-cat-image.jpg';
                                        $cat_featured_image_alt = 'default-image';
                                    }

                                    if( isset( $category_options['cat_logo']['url'] ) ){
                                        $cat_logo_url       = $category_options['cat_logo']['url'];
                                        $cat_logo_alt       = $category_options['cat_logo']['alt']; 
                                    }else{
                                        $cat_logo_url       = get_template_directory_uri().'/assets/images/default-icon.png';
                                        $cat_logo_alt       = 'default-icon';
                                    }                                
                                    ?>
                                    <div class="category">
                                        <?php if( !empty($cat_featured_image_url ) ): ?>
                                        <figure class="featured-image">
                                            <img src="<?php echo $cat_featured_image_url; ?>" alt="<?php echo $cat_featured_image_alt; ?>">
                                        </figure>
                                        <?php endif; ?>
                                        <div class="category-content">
                                            <div class="entry-header heading">
                                                <h4 class="entry-title">
                                                    <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
                                                </h4>
                                            </div>
                                            <div class="category-button ">
                                                <a href="<?php echo $category_link; ?>" class="primary-btn"><?php _e( 'get started here', 'tactical' ); ?></a>
                                            </div>
                                        </div>
                                        <?php if( !empty($cat_logo_url ) ): ?>
                                        <figure class="featured-image icon-img">
                                            <img src="<?php echo $cat_logo_url; ?>" alt="<?php echo $cat_logo_alt; ?>">
                                        </figure>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                }
                            }
                            
                            ?>
                           
                        </div>
                    </div>
                </section>
                <?php endif; ?>
            </main>
            <!-- #main-->
        </div>
        <!-- #primary-->
    </div>
<?php
get_footer();
