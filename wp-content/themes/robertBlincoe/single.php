<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RWS_AEP
 */

get_header();
	while ( have_posts() ) : the_post();				
	?> 

	<div id="content" class="site-content">
        <div class="container">
            <div class="row">

	            <section class="single-page-section custom-col-8">                
						
					<article <?php post_class( ); ?> >		                        	
	                    <div class="entry-content">
							<?php
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'robertblincoe' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'robertblincoe' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->                                   
	                </article>	

	                <?php get_template_part( 'template-parts/content-notice' ); ?>

	                <?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;?>
				</section>
				<?php get_sidebar( ); ?>

            </div>
        </div>
    </div>
	
	<?php		
	endwhile; 
get_footer();