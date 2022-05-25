<?php
/**
 * The template for notice
 *
 * @package WordPress
 * @subpackage tactical
 */

    $options                    = get_option('theme_options');    
    $notice_sec_enable         	= $options['notice_sec_enable'];
    $post_notice_title         	= $options['post_notice_title'];
    $post_notice             	= $options['post_notice']; 
    if( $notice_sec_enable == 1 ):
	?>
	<div class="post-notice">
		<?php if( !empty($post_notice_title) ) :?>
		<div class="entry-header">
	        <h3 class="entry-title"><?php echo $post_notice_title; ?></h3>
	    </div>
		<?php endif; ?>
		<?php echo wpautop( $post_notice ); ?>
	</div>
	<?php endif;