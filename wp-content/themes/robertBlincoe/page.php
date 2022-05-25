<?php
/**
 * page
 */
get_header();
while ( have_posts() ) : the_post();
?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">

            <div id="primary" class="content-area custom-col-12">
                <main id="main" class="site-main" role="main">
                    <section class="general-sec">
                       
                            <article class="blog-post" <?php post_class('post'); ?> >       
                                <div class="content">                                    
                                    <div class="entry-content" >              
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>
                         
                    </section>
                </main>
                <!-- #main -->
            </div>
        </div>
    </div>
</div><!-- #content -->
<?php
endwhile; 
get_footer();