<?php
   /**
    * The sidebar containing the main widget area
    *
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
    *
    * @package WordPress
    * @subpackage South_Bennd
    * @since 1.0
    * @version 1.0
    */
   ?>
<div id="secondary" class="widget-area custom-col-4">
   <div class="sticky-wrap">
      <aside id="table_of_content_wrapper" class="widget">
         <div class="entry-header">
            <h3 class="entry-title">Table of Contents</h3>
         </div>
         <!-- <ol id="table-of-content-list" class="tableofcontentsblock" data-toc=".entry-content" data-toc-headings="h1,h2,h3"></ol> -->
         <ul id="table-of-content-list"></ul>
      </aside>
      <!--#table_of_content_wrapper-->

      <?php 

      $author_name          = get_the_author_meta( 'display_name', $post->post_author );
      $author_description   = get_the_author_meta( 'user_description', $post->post_author );
      $author_details       = get_avatar( get_the_author_meta('user_email') , 90 ) ;
     
      ?>
      <aside class="author widget">
          <div class="entry-header">
              <h3 class="entry-title">About Author</h3>
          </div>
          <div class="table-desc-wrapper">
              <?php if( !empty( $author_details ) ): ?>
              <figure class="featured-image">
                 <?php echo $author_details; ?>
              </figure>
              <?php endif; ?>
              <h4><?php echo $author_name; ?></h4>
              <?php echo wpautop( $author_description ); ?>
          </div>
      </aside>

      <?php if ( is_active_sidebar( 'sidebar-widget' ) ) : ?>
          <?php dynamic_sidebar( 'sidebar-widget' ); ?>   
      <?php endif; ?>
        
   </div>
</div>
<!--#secondary-->