<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    

<?php wp_head(); ?>
</head>

<body <?php body_class();?> >
      <?php wp_body_open(); ?>
    <div id="page" class="hfeed site">
      	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <?php
        $options                                = get_option( 'theme_options' );
        $top_header_social_link_enable          = $options['top_header_social_link_enable'];
        $top_header_subbscribe_btn_text         = $options['top_header_subbscribe_btn_text'];
        $top_header_subbscribe_shortcode        = $options['top_header_subbscribe_shortcode'];
        $social_group                           = $options['social_group'];
        ?>
        <header id="masthead" class="site-header">
            <section class="hgroup-wrap">
                <div class="hgroup-right">
                    <div class="top-header-wrapper">
                        <div class="container">
                            
                            <div class="top-header-wrap">                              
                                <?php  
                                if( $top_header_social_link_enable == 1 ):
                                if( is_array($social_group ) && !empty($social_group ) ):
                                ?>
                                <div class="inline-social-icon social-links">
                                    <ul>
                                        <?php foreach ($social_group as $key => $value) {
                                            $social_item_title          = $value['social_item_title'];
                                            $social_item_external_link  = $value['social_item_external_link'];
                                            ?>
                                                <li>
                                                    <a href="<?php echo ( $social_item_external_link )  ? $social_item_external_link : '#'; ?>" title="<?php echo $social_item_title; ?>" target="blank"></a>
                                                </li>
                                            <?php
                                        } 
                                        ?>
                                    </ul>
                                </div>
                                <?php 
                                endif;
                                endif;
                                ?>

                                <div class="site-branding">
                                    <div class="site-title">
                                        <a href="<?php echo home_url( "/"); ?>">
                                            <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                                            if (empty($custom_logo_id)) {
                                                echo '<h1>' . get_bloginfo('title') . '</h1>';
                                            }else{
                                            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('title');?>">
                                            <?php } ?>
                                        </a>   
                                    </div>
                                </div>
                                <!-- .site-branding -->
                                <div class="sucribe-menu-wrap">
                                    <button class="primary-btn maxmeout" data-toggle="modal" data-target="#submodal"><?php echo ( $top_header_subbscribe_btn_text ) ? $top_header_subbscribe_btn_text : 'SUBSCRIBE HERE'; ?></button>
                                </div>   
                            </div>
                            <?php  ?>
                        </div>
                    </div>
                    <div class="bottom-header-wrapper">
                      <div class="container">
                        <div id="navbar" class="navbar">
                          <nav id="site-navigation" class="navigation main-navigation">
                            <div class="menu-top-menu-container">
                                <?php 

                                /**
                                * Displays a navigation menu
                                * @param array $args Arguments
                                */
                                if( has_nav_menu( 'primary' )):
                                    $args = array(
                                        'theme_location' => 'primary',
                                        'menu' => '',
                                        'container' => '',
                                        'container_class' => '',
                                        'container_id' => '',
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'echo' => true,
                                        'fallback_cb' => '',
                                        'before' => '',
                                        'after' => '',
                                        //'link_before' => '<div>',
                                        //'link_after' => '</div>',
                                        'items_wrap' => '<ul>%3$s</ul>',
                                        'depth' => 0,
                                    );                      
                                    wp_nav_menu( $args );
                                endif;
                                ?>
                            </div>
                          </nav>
                        </div>
                        <!-- navbar ends here -->

                      </div>
                    </div>
                </div> 
                <!-- .hgroup-right -->
            <!-- .container -->
            </section>
            <!-- .hgroup-wrap -->
        </header>

        <div class="modal" tabindex="-1" id="submodal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <?php if( !empty($top_header_subbscribe_shortcode ) ): ?>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="popflex">
                            <?php if (function_exists('tve_leads_form_display')) { 

                                tve_leads_form_display(0, $top_header_subbscribe_shortcode); 

                            } ?>
                                <button type="button" class="btn btn-danger btn-lg btn-block widetactic" data-dismiss="modal">KEEP BROWSING</button>            
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>                 
                </div>
            </div>
        </div>

        <?php
        if( is_single( ) ):
            $featured_image_as_banner_uri = '';
            $banner_image = '';
            $page_bg = '';            
            $post_id = get_the_ID();

            $title = get_the_title();
            $post_date = get_the_date( );
            $author_id = get_post_field( 'post_author', $post_id );
            $author_name = get_the_author_meta( 'display_name', $author_id );

            if (has_post_thumbnail($post_id) ){
                $featured_image_as_banner = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
                if(isset( $featured_image_as_banner[0] )){
                    $featured_image_as_banner_uri = $featured_image_as_banner[0];
                } 
                $page_bg = '';
            }
            else{
                $page_bg = 'no-page-bg';

            }

            ?>
            <section class="single-page-banner" style="background: url(<?php echo $featured_image_as_banner_uri; ?>); background-repeat: no-repeat;
                background-size:cover;">
                <div class="container">
                    <div class="entry-header heading">
                        <h1 class="entry-title">
                            <?php echo $title; ?>
                        </h1>
                     </div>
                     <div class="breadcrump">
                         <div class="date item">
                            <figure class="featured-image">
                                <img src="<?php echo get_template_directory_uri()."/assets/images/calender.svg"?>" alt="calender-icon">
                            </figure>
                            <div class="entry-meta">
                              <span class="posted-on"><?php echo $post_date; ?></span>
                             </div>
                         </div>
                         <div class="comment item">
                             <figure class="featured-image">
                                <img src="<?php echo get_template_directory_uri()."/assets/images/comments.svg"?>" alt="comment-icon">
                             </figure>
                             <div class="entry-meta">
                              <span class="comments">
                                <a href="<?php echo comments_link(); ?>">
                                    <?php echo $tactical_comment_count  = get_comments_number(); ?>
                                </a></span>
                             </div>
                         </div>

                        <div class="user item">
                             <figure class="featured-image">
                                <img src="<?php echo get_template_directory_uri()."/assets/images/author.svg"?>" alt="user-icon">
                             </figure>
                             <div class="entry-meta">
                              <span class="posted-By"><?php echo $author_name; ?></span>
                             </div>
                        </div>
                     </div>
                </div>
            </section>
        <?php endif;  
