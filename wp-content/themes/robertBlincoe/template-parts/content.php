<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWS
 */
?>
<article class="blog-post" <?php post_class('post'); ?> >       
    <div class="content">
    	<?php

    		if( has_post_thumbnail( )){
    			?>
    			<figure class="featured-image">
                   <?php 
                   the_post_thumbnail('full');
                   ?>
                </figure>                                            
    			<?php
    		}
    	?>
    	<div class="entry-content" >
    		<h3 class="entry-title">
	    		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	    	</h3>	
	        <?php the_content();  
            ?>
        </div>
    </div>
</article>
