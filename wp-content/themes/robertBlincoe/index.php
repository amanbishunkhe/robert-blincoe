<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Benchworks
 */

get_header();
if ( is_home() && ! is_front_page() ) :
							
	$blog_page_title = get_the_title( get_option('page_for_posts', true) );
	$page_for_posts = get_option( 'page_for_posts' );


	$blog_image_as_banner_uri = ' ';
	$blog_image_as_banner = wp_get_attachment_image_src( get_post_thumbnail_id($page_for_posts), 'full' );

        if(isset( $blog_image_as_banner[0] )){
            $blog_image_as_banner_uri = $blog_image_as_banner[0];

        } 

	?>
	<section class="page-title-wrap" style="background: url(<?php echo $blog_image_as_banner_uri; ?>); background-repeat: no-repeat;background-size:cover;" >
            <div class="container">
                <h1 class="page-title"><?php echo $blog_page_title; ?></h1>                 
            </div>  
    </section>							
	<?php
endif;
?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<section class="blog-post-wrap">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</section>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
