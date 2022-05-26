<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/*================================================
=            Image Template Functions            =
================================================*/

/**
 * Returns the url of image
 * @param  [array] $param 
 * @return string
 */
function robert_image_src( $param ) {

    if( !is_array( $param ) ) {
        return;
    }
    if ( empty ( $param['size'] ) ){

        $param['size']  = 'full' ;
    }
    $image = wp_get_attachment_image_src( $param['id'], $param['size'] );
    
    return $image[0];
}

/*=====  End of Image Template Functions  ======*/



add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        }  elseif (is_post_type_archive()) {
            
            if ( get_post_type() == 'product' ){
                $title = 'Our Products';
            }else{
                $title = post_type_archive_title( '', false );
            }
            
        }  
    return $title;    
});

function get_VimeoVideoIdFromUrl($url = '') {

    $regs = array();

    $id = '';

    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }

    return $id;

}


function get_YoutubeVideoIdFromUrl($url = '')
{   
    global $post;
    $regs = array();
    $id = '';

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match); 
    $id = isset($match[1]) ? $match[1]: '';

     return $id;
}

//breadcrumb function
if( ! function_exists( 'get_breadcrumb' ) ) :
    /**
     * Simple breadcrumb
     * Source: https://gist.github.com/melissacabral/4032941
     */
    function get_breadcrumb( $args = array() ){
        $args = wp_parse_args( (array) $args, array(
            //'separator' =>  '&gt;',
            'separator' =>  '',
        ) );

        /* === OPTIONS === */
        //$text['home']     = get_bloginfo( 'name' ); // text for the 'Home' link
        $text['home']     = 'Home'; // text for the 'Home' link
        $text['category'] = __( 'Archive for <em>%s</em>', 'rigorous' ); // text for a category page
        $text['tax']      = __( 'Archive for <em>%s</em>', 'rigorous' ); // text for a taxonomy page
        $text['search']   = __( 'Search results for: <em>%s</em>', 'rigorous' ); // text for a search results page
        $text['tag']      = __( 'Posts tagged <em>%s</em>', 'rigorous' ); // text for a tag page
        $text['author']   = __( 'View all posts by <em>%s</em>', 'rigorous' ); // text for an author page
        $text['404']      = __( 'Error 404', 'rigorous' ); // text for the 404 page

        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter   = ' ' . $args['separator'] . ' '; // delimiter between crumbs
        $before      = '<li class="current">'; // tag before the current crumb
        $after       = '</li>'; // tag after the current crumb
        /* === END OF OPTIONS === */

        global $post;
        $homeLink   = esc_url( home_url( '/' ) );
        $linkBefore = '<li typeof="v:Breadcrumb">';
        $linkAfter  = '</li>';
        $linkAttr   = ' rel="v:url" property="v:title"';
        $link       = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

        if (is_home() || is_front_page()) {

            if ($showOnHome == 1) echo '<ol class="breadcrumb"><li><a href="' . $homeLink . '">' . $text['home'] . '</a></li></div>';

        } else {
            echo '<div class="breadcum-wrapper">';
            echo '<div class="container">';
            echo '<ol class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

                if ( is_category() ) {
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        echo $cats;
                    }
                    echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

                } elseif( is_tax('alumni_class') ){
                    /*$thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        echo $cats;
                    }*/

                    echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;

                }elseif ( is_search() ) {
                    echo $before . sprintf($text['search'], get_search_query()) . $after;

                } elseif ( is_day() ) {
                    echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
                    echo $before . get_the_time('d') . $after;

                } elseif ( is_month() ) {
                    echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    echo $before . get_the_time('F') . $after;

                } elseif ( is_year() ) {
                    echo $before . get_the_time('Y') . $after;

                } elseif ( is_single() && !is_attachment() ) {
                    if ( get_post_type() != 'post' ) {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        /*echo '<pre>';
                            print_r($post_type);
                        echo '</pre>';*/
                        printf($link, $homeLink . '/' . $slug['slug'] .'', $post_type->labels->name);

                        /* added for custom taxonomy for AEP starts */
                        if( get_post_type() == 'alumni' ) {
                            $term_alumni = get_the_terms( $post, 'alumni_class' );
                            if ( !empty( $term_alumni ) ){
                                foreach ( $term_alumni as $key => $value ) {
                                    echo '<li><a href="' . get_term_link( $value->term_id ) . '">' . $value->name . '</a></li>';
                                }
                            }
                        }
                        /* addition custom taxonomu for AEP Ends */

                        if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
                    } else {
                        $cat = get_the_category(); $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, $delimiter);
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        echo  $cats;
                        if ($showCurrent == 1) echo $before . get_the_title() . $after;
                    }


                } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    echo $before . $post_type->labels->singular_name . $after;

                } elseif ( is_attachment() ) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID); $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    echo $cats;
                    printf($link, get_permalink($parent), $parent->post_title);
                    if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

                } elseif ( is_page() && !$post->post_parent ) {
                    if ($showCurrent == 1) echo $before . get_the_title() . $after;

                } elseif ( is_page() && $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        $parent_id  = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                        if ($i != count($breadcrumbs)-1) echo $delimiter;
                    }
                    if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

                } elseif ( is_tag() ) {
                    echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

                } elseif ( is_author() ) {
                    global $author;
                    $userdata = get_userdata($author);
                    echo $before . sprintf($text['author'], $userdata->display_name) . $after;

                } elseif ( is_404() ) {
                    echo $before . $text['404'] . $after;
                } 
                /* addition of the URL */
                elseif( is_single( "alumni" ) ) {
                    echo "here we are";
                } /* added last condition for custom */

                /* if ( get_query_var('paged') ) {
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo __( 'Page', 'rigorous' ) . ' ' . get_query_var('paged');
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                } */

            echo '</ol>';
            echo '</div>';
            echo '</div>';
        }
    } // end robert_simple_breadcrumb()
endif;
/**
 * breadcum ends
 */

function get_trimed_description( $content ){
    $more_link = '...';
    $trimmed_content = wp_trim_words( $content , '5' , $more_link );
    return $trimmed_content;
}
