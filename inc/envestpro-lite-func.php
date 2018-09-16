<?php 
/**
 * The template for custom function 
 *  
 * @package EnvestPro_Lite
 */

?>

<?php
/**
 * Custom logo.
 */ 
function envest_pro_lite_Logo(){
    global $viktor_lite;
   $logo = get_custom_logo();   
    if( $logo ){
        the_custom_logo();
       }else{ ?> 
        <a class="logolink" href="<?php echo esc_url(home_url('/')); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
   <?php }
} 

/**
 * Copyright text. 
 */ 
function envest_pro_lite_copyright(){ 
    $copy_text = get_theme_mod( 'v_copyright_text' );
    if(!empty($copy_text)){
   ?>
    <p><?php echo esc_html($copy_text); ?></p>
   <?php
    }else{
        $url1 =  esc_url('https://digitalcenturysf.com/templates/');
        $url2 =  esc_url('https://digitalcenturysf.com/'); 
        $text =  esc_html__('Free WordPress Themes','envestpro-lite');
        $text2 =  esc_html__('Best WordPress Themes','envestpro-lite');
        printf( '<p><a href="%s">%s</a> Powered by <a class="credits" href="%s">%s</a></p>', esc_url($url1), esc_html($text), esc_url($url2), esc_html($text2) );
    }
}
 
/**
 * Get post ID.
 *  
 * @param bool $postID    this is post ID.
 */  
function envest_pro_lite_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==0){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __('0 Views','envestpro-lite');
    }elseif($count==1){
		return $count. __(' Views','envestpro-lite');
    }else{
    	return $count. __(' Views','envestpro-lite');
    }
}

 
/**
 * Set post ID.
 *  
 * @param bool $postID    this is post ID.
 */  
function envest_pro_lite_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/**
 * Comment list. 
 * 
 * @param string $comment   the comment.
 * @param string $args      the arguments.
 * @param bool   $depth     the comment depth.
 */  
function envest_pro_lite_comments_list($comment, $args, $depth) {  ?>  
<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>> 
    <div class="cmnt_bx">
        <div class="cmnt_bx_img"> 
        <?php echo get_avatar( $comment, 120 ); ?> 
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        </div>
        <div class="cmnt_bx_txt">
          <ul class="comnt">
            <li>
              <h2><?php comment_author(); ?></h2>
            </li>
            <li>
              <h3><?php echo get_comment_date( 'F jS, Y' ); esc_html_e(' at ','envestpro-lite'); echo comment_time('g:i a'); ?></h3>
            </li>
          </ul>
            <?php if ($comment->comment_approved == '0') : ?>
                <p><em><?php esc_html_e('Your comment is awaiting moderation.','envestpro-lite'); ?></em></p>
            <?php endif; ?>
            <?php comment_text(); ?>  
        </div>
    </div>
<?php } 

 
/**
 * Comment form modify.
 *
 * @param string $fields the comment filed types.
 */  
function envest_pro_lite_comment_fields($fields) {
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );

    unset($fields['url']);

    $fields['author'] = ' <ul><li class="en-author"><input type="text" class="form_txt" id="name" placeholder="'.esc_attr("Full Name","envestpro-lite").'" name="name" value="' . esc_attr( $commenter['comment_author'] ) .
    '"></li>';
    $fields['email'] = '<li class="en-email"> <input type="email" class="form_txt" id="email" placeholder="'.esc_attr("Email ID","envestpro-lite").'" name="email"  value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '"> </li>';
    $fields['url'] =  '<li class="en-url"><input type="url" id="url" class="form_txt" placeholder="'.esc_attr("Website","envestpro-lite").'" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></li>';
    return $fields;
}
add_filter('comment_form_default_fields','envest_pro_lite_comment_fields');

 
/**
 * Comment form field order change.
 */   
function envest_pro_lite_form_order_textarea()
{
    echo '<li>
            <textarea class="form_txt_msg" id="comment" name="comment" cols="30" rows="4" placeholder="'.esc_attr("Comment","envestpro-lite").'" required></textarea> 
         </li> </ul>';
} 
add_action( 'comment_form_after_fields', 'envest_pro_lite_form_order_textarea' );
add_action( 'comment_form_logged_in_after', 'envest_pro_lite_form_order_textarea' );


/**
 * Comment args change
 *
 * @param string $defaults default values.
 */   
function envest_pro_lite_comment_form_allowed_tags( $defaults ) { 

    $defaults['class_form'] = 'validate-form'; 
    $defaults['id_form'] = 'add-comment'; 
    $defaults['class_submit'] = ''; 
    $defaults['title_reply'] = wp_kses( __('Leave a comment','envestpro-lite'  ), array('i'=> array('class' => array())) ); 
    $defaults['title_reply_before'] =  '<div class="bx_head mt60"><h3>';
    $defaults['title_reply_after'] =  '</div></h3>';
    $defaults['comment_notes_before'] =  '';
    $defaults['comment_field'] = '';
    $defaults['label_submit'] =  esc_html__( 'Post comment','envestpro-lite' ); 
    $defaults['submit_button'] =  '<input name="%1$s" type="submit" id="%2$s" class="cmn_btn1 %3$s" value="%4$s" />'; 
    return $defaults;
}
add_filter( 'comment_form_defaults', 'envest_pro_lite_comment_form_allowed_tags' );


if ( ! function_exists( 'enves_pro_lite_pagination' ) ){ 
    /**
     * Pagination.
     *
     * @param bool $numpages number of pages.
     * @param bool $pagerange range of pages.
     * @param bool $paged start of pages.
     */  
    function enves_pro_lite_pagination($numpages = '', $pagerange = '', $paged='') {

        if (empty($pagerange)) {
            $pagerange = 2;
        }

        if (empty($paged)) {
            $paged = 1;
        }
        if ($numpages == '') {
            global $wp_query;
            $numpages = $wp_query->max_num_pages;
                if(!$numpages) {
                    $numpages = 1;
            }
        }
     
        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );
        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }
        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        $pagination_args = array(
            'base'      => $pagenum_link,
            'format'    => $format,
            'total'     => $numpages,
            'current'   => $paged,
            'mid_size'  => 3,
            'show_all'  => False,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => '<i class="fa fa-angle-double-left"></i>',
            'next_text' => '<i class="fa fa-angle-double-right"></i>',
            'type'      => 'list',
        );

        $paginate_links = paginate_links($pagination_args);

        if ($paginate_links) {
            print $paginate_links;
        } 
    }
}

/**
 * Main Menu. 
 */  
function envest_pro_lite_main_menu(){
    wp_nav_menu( array(
        'theme_location'    => 'menu-1',
        'depth'             => 3,
        'container'         => false,
        'menu_id'           => 'envestpro-lite-main-nav',
        'menu_class'        => 'nav navbar-nav', 
        'walker'            => new EnvestPro_Lite(),
        'fallback_cb'       => 'envest_pro_lite_default_menu'
    ));
}  
 
/**
 * Fallback menu.
 */  
function envest_pro_lite_default_menu() {
    ?>
    <ul class="nav navbar-nav dflt"> 
        <li>
            <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" class="active"><?php esc_html_e( 'ADD MENU', 'envestpro-lite' ); ?></a> 
        </li>                
    </ul>
    <?php
}  


/**
 * Fallback menu.
 * 
 * @param string $icon the icon class.
 */   
function envest_pro_lite_team_social_links($icon) {
    $ico = str_replace('-', '_', $icon);
    $ic = '_envest_pro_lite_'.$ico;
    $link = get_post_meta(get_the_ID(),$ic,true);
    if(!empty($link)){
        echo '<li><a href="'.esc_url($link).'"><i class="fa fa-'.esc_attr($icon).'"></i></a></li>';
    }
}  


/**
 * Breadcrumb. 
 */    
function envest_pro_lite_breadcrumb() { 
    global $post,$envest_pro; 
    
    $envest_pro_lite_blog_title=  esc_html__('Blog','envestpro-lite');
    
    if(is_front_page() && is_home()){
        echo esc_html($envest_pro_lite_blog_title);

    }elseif(is_home() || is_page()){
        if(is_page()){
            $envest_pro_lite_ptitle = get_the_title();
        }else{
            $envest_pro_lite_ptitle =  $envest_pro_lite_blog_title;
        }
        echo esc_html($envest_pro_lite_ptitle);
    }elseif(is_single()){ 
        if( class_exists('WooCommerce' ) && is_product()){
            do_action('envest_pro_lite_woo_breadcrumb');
        }else{
            the_title();             
        }
    }elseif(is_search()){ 
            printf( get_search_query()  ); 
    }elseif(is_category() || is_tag()) { 
            single_cat_title("", true);  
    }elseif(is_archive()){ 
        if ( class_exists('WooCommerce' ) ){
            if(is_shop() || is_product_category() || is_product_tag() ){ 
                woocommerce_page_title();   
            }else{  
                echo get_the_date('F Y');  
            } 
        }else{  
            echo get_the_date('F Y');  
        }
    }elseif(is_404()){ esc_html_e('404','envestpro-lite');}else{ the_title();}
}
