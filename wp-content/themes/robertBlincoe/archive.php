<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RWS
 */

get_header(); 

    $category   = get_the_category(); 
    $term_id    = $category[0]->cat_ID;

    $cat_options   = get_term_meta( $term_id, 'category_options', true );

    // echo '<pre>';
    // print_r($cat_options);
    // echo '</pre>';

    if( is_array($cat_options) && isset($cat_options['cat_featured_image']['id']) ){
        $cat_featured_image_id = $cat_options['cat_featured_image']['id'];
        $cat_featured_image_url = tactical_image_src( array( 'id' => $cat_featured_image_id , 'size' => 'cat-banner-image' ) );
        $cat_featured_image_alt = $cat_options['cat_featured_image']['alt'];
    }
    else{
        $cat_featured_image_url = get_template_directory_uri().'/assets/images/default-cat-image.jpg';
        $cat_featured_image_alt = 'default-image';
    }

?>
<section class="archive-banner-section" style="background: url(<?php echo $cat_featured_image_url; ?>); background-repeat: no-repeat; background-size:cover;">
    <div class="container">
        <div class="section-title">
            <div class="section-title-wrap">
                <header class="entry-header">
                    <h1 class="page-title"> <?php  echo get_the_archive_title();?> </h1>
                </header>
                <?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
            </div>
        </div>       
    </div>
</section>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="archive-page-section listing-post-wrapper">
                <div class="container">
                    <!-- <div class="section-title">
                        <div class="section-title-wrap">
                            <header class="entry-header">
                                <h2 class="page-title"> <?php  echo get_the_archive_title();?> </h2>
                            </header>
                        </div>
                    </div>   -->
                      
                    <div class="row">  
                        <div class="category-post-wrapper post-wrapper">
                            <?php                 
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();   
                                $post_categories = wp_get_post_categories( get_the_ID() );                            
                                    ?>                                    
                                    <article class="post">
                                        <?php
                                            if( has_post_thumbnail( )){

                                                $archive_image_url=wp_get_attachment_image_src(get_post_thumbnail_id(),'latest-articles',false);
                                                $archive_img= esc_url( $archive_image_url[0]);

                                                $archive_image_id = get_post_thumbnail_id();

                                                $archive_image_alt = get_post_meta($archive_image_id, '_wp_attachment_image_alt', TRUE);

                                                ?><a href=" <?php the_permalink(  );?>">
                                                <figure class="featured-image">
                                                    <img src="<?php echo $archive_img; ?>" alt="<?php echo $archive_image_alt; ?>">
                                                </figure>
                                                </a>
                                                <?php
                                            }
                                        ?>
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
                                                <a href="<?php the_permalink( ); ?>">Read more</a>
                                            </div> -->
                                        </div>                                   
                                    </article>                                    
                                <?php
                                endwhile;   
                                the_posts_navigation();
                            else :
                                get_template_part( 'template-parts/content');
                            endif; ?>
                        </div>                      
                    </div> 
                </div>
            </section>
            
        </main>
    </div>
</div>
<?php
get_footer();