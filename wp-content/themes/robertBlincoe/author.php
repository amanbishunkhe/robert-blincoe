<?php get_header(); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="author-page-section listing-post-wrapper">
                <div class="container">
                <?php
                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));   
                    ?>
                    <div class="entry-header heading">
                        <h1 class="entry-title">
                            Posts By <?php echo $curauth->nickname; ?>:
                        </h1>
                     </div>
                    <div class="author-posts-wrapper">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                            <article class="post os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.7s">
                                    <figure class="featured-image">
                                        <?php 
                                        if(has_post_thumbnail( ))
                                            {
                                                $image_id = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'author-post-image' ); 
                                                $image_url = $image_id['0'];                  
                                                ?>
                                                <img src="<?php echo $image_url;?>" alt="" />
                                                <?php
                                            } 
                                            ?>
                                    </figure>
                                    <div class="post-content-wrap">
                                        <div class="entry-meta">
                                            <span class="date">
                                                <a href="#" rel="bookmark">                
                                                  <?php the_time('d M Y'); ?>
                                                </a>
                                            </span>
                                            <span class="cat-links">
                                                <?php the_category('&');?>
                                            </span>
                                        </div>

                                        <h3 class="entry-title">
                                            <a href="<?php the_permalink( );?>"> <?php the_title();?></a>
                                        </h3>
                                        <?php the_content();?>
                                    </div>                                    
                            </article>    


                        <?php endwhile; else: ?>
                            <p><?php _e('No posts by this author.'); ?></p>

                        <?php endif; ?>
                    </div>

                </div>
            </section>
        </main>
    </div>
</div>
<?php get_footer();