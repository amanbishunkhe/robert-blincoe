<?php
    $options                    = get_option('theme_options');    

    $copyright_switcher         = $options['copyright_switcher'];
    $copyright_text             = $options['copyright_text'];   

    $footer_sec_enable                  = $options['footer_sec_enable'];
    $footer_logo                        = $options['footer_logo'];
    if( is_array($footer_logo) && isset($footer_logo['url']) ){
        $footer_logo_url = $footer_logo['url'];
        $footer_logo_alt = $footer_logo['alt'];
    }
    $footer_section_desc                = $options['footer_section_desc'];
    $footer_subscribe_form_title        = $options['footer_subscribe_form_title'];
    $footer_subscribe_form_desc         = $options['footer_subscribe_form_desc'];
    $footer_section_subscribe_form      = $options['footer_section_subscribe_form'];
    $footer_social_links_enable         = $options['footer_social_links_enable'];

    $global_banner_image                = $options['global_banner_image'];
    $social_group                       = $options['social_group'];
    ?>
    <footer id="colophon" class="site-footer">
        <div class="widget-area">
            <div class="container">
                <div class="row">
                    <div class="custom-col-5">
                        <aside class="widget">
                            <div class="textwidget">
                                <?php if( !empty($footer_logo_url) ): ?>
                                <img src="<?php echo $footer_logo_url; ?>" class="site-footer-img" alt="<?php echo $footer_logo_alt; ?>">
                                <?php endif; 
                                    echo wpautop( $footer_section_desc );
                                ?>
                            </div>
                        </aside>
                        <?php if( $footer_social_links_enable == 1 ): ?>
                        <aside class="social-icon">
                            <div class="inline-social-icon">
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
                        </aside>
                        <?php endif; ?>
                    </div>
                <div class="custom-col-7">
                  <aside class="widget">
                        <?php if( !empty($footer_subscribe_form_title) ): ?>
                            <h2 class="widget-title"><?php echo $footer_subscribe_form_title; ?></h2>
                        <?php endif;
                            echo wpautop( $footer_subscribe_form_desc );

                            echo do_shortcode($footer_section_subscribe_form );
                        ?>                        
                  </aside>
                </div>
              </div>
            </div>
        </div>
        <div class="site-generator">
            <div class="container">
                <div class="site-generator-wrapper">
                    <span class="copy-right">
                        <span>
                            &copy; <?php echo date ('Y') .' '. $copyright_text; ?>
                        </span>
                    </span>
                    <span class="policies">
                        <?php 
                           /**
                            * Displays a navigation menu
                            * @param array $args Arguments
                            */
                            if( has_nav_menu( 'privacy' )):
                                $args = array(
                                    'theme_location' => 'privacy',
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
                                    'walker' => ''
                                );                      
                                wp_nav_menu( $args );
                            endif;
                            ?>
                    </span>
                </div>
            </div>
            <!-- .container -->
        </div>
      <!-- .site-generator -->
    </footer>

  <!-- .site-footer -->
  <div class="back-to-top" style="display: block;">
      <!-- back to top starts from here -->
      <a href="#masthead" title="Go to Top" class="fa fa-angle-up"></a>
  </div>
  <!-- .site-footer -->
  <div class="back-to-top" style="display: block;">
      <!-- back to top starts from here -->
      <a href="#masthead" title="Go to Top" class="fa fa-angle-up"></a>
  </div>
<!-- #page -->
<?php wp_footer(); ?>
</body>

</html>