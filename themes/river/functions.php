<?php
//$qode_toolbar = true;

load_theme_textdomain( 'qode', get_template_directory().'/languages' );

if(isset($qode_toolbar)):
		
add_action('after_setup_theme', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

/* Start session */
if (!function_exists('myStartSession')) {
function myStartSession() {
    if(!session_id()) {
        //session_start();
    }
		if (!empty($_GET['animation']))
			$_SESSION['qode_animation'] = $_GET['animation'];
		if (isset($_SESSION['qode_animation']))
		if ($_SESSION['qode_animation'] == "off")
			$_SESSION['qode_animation'] = "";
}}

/* End session */

if (!function_exists('myEndSession')) {
function myEndSession() {
    session_destroy ();
}
}

endif;

add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');


define('QODE_ROOT', get_template_directory_uri());
define('QODE_VAR_PREFIX', 'qode_'); 
include_once('widgets/relate_posts_widget.php');
include_once('includes/shortcodes.php');
include_once('includes/qode-options.php');
include_once('includes/custom-fields.php');
include_once('includes/custom-fields-post-formats.php');
include_once('includes/qode-menu.php');
include_once('includes/qode-custom-sidebar.php');
include_once('includes/qode-like.php' );
include_once('includes/qode-breadcrumbs.php');
include_once('widgets/flickr-qode-widget.php');
include_once('widgets/latest_posts_menu.php');
include_once('widgets/call_to_action_widget.php');

add_filter( 'call_to_action_widget', 'do_shortcode');

/* Add css */

if (!function_exists('qode_styles')) {
function qode_styles() {
	global $qode_options_river;
	global $wp_styles;
	global $qode_toolbar;
	global $woocommerce;
        
        wp_enqueue_style("default_style", QODE_ROOT . "/style.css");
        wp_enqueue_style("font-awesome", QODE_ROOT . "/css/font-awesome/css/font-awesome.min.css");
        wp_enqueue_style("stylesheet", QODE_ROOT . "/css/stylesheet.min.css");
        wp_enqueue_style("js_composer_front", QODE_ROOT . "/wpbakery/js_composer/assets/css/js_composer_front.css");

        wp_enqueue_style("style_dynamic", QODE_ROOT . "/css/style_dynamic.php");

        $responsiveness = "yes";
        if (isset($qode_options_river['responsiveness']))
            $responsiveness = $qode_options_river['responsiveness'];
        if ($responsiveness != "no"):
            wp_enqueue_style("responsive", QODE_ROOT . "/css/responsive.min.css");
            wp_enqueue_style("style_dynamic_responsive", QODE_ROOT . "/css/style_dynamic_responsive.php");
        endif;
        if (isset($qode_toolbar)):
            wp_enqueue_style("toolbar", QODE_ROOT . "/css/toolbar.css");
        endif;
        wp_enqueue_style("custom_css", QODE_ROOT . "/css/custom_css.php");


	
	$fonts_array  = array(
		$qode_options_river['google_fonts'].':200,300,400',
		$qode_options_river['page_title_google_fonts'].':200,300,400',
		$qode_options_river['h1_google_fonts'].':200,300,400',
		$qode_options_river['h2_google_fonts'].':200,300,400',
		$qode_options_river['h3_google_fonts'].':200,300,400',
		$qode_options_river['h4_google_fonts'].':200,300,400',
		$qode_options_river['h5_google_fonts'].':200,300,400',
		$qode_options_river['h6_google_fonts'].':200,300,400',
		$qode_options_river['text_google_fonts'].':200,300,400',
		$qode_options_river['menu_google_fonts'].':200,300,400',
		$qode_options_river['dropdown_google_fonts'].':200,300,400',
		$qode_options_river['dropdown_google_fonts_thirdlvl'].':200,300,400',
		$qode_options_river['mobile_google_fonts'].':200,300,400',
		$qode_options_river['button_title_google_fonts'].':200,300,400',
		$qode_options_river['message_title_google_fonts'].':200,300,400'
	);
	
	$fonts_array=array_diff($fonts_array, array("-1:200,300,400"));
	$google_fonts_string = implode( '|', $fonts_array);
    
	if(count($fonts_array) > 0) :
		printf("<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:300italic,400:italic,400|%s&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n", str_replace(' ', '+', $google_fonts_string));
	else :
		printf("<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:300italic,400:italic,400&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n");
	endif;
}
}

/* Add js */

if (!function_exists('qode_scripts')) {
function qode_scripts() {
	global $qode_options_river;
	global $is_IE;
	global $qode_toolbar;
        global $woocommerce;
	wp_enqueue_script("jquery");
	wp_enqueue_script("plugins", QODE_ROOT."/js/plugins.js",array(),false,true);

	if ( $is_IE ) {
		wp_enqueue_script("html5", QODE_ROOT."/js/html5.js",array(),false,false);
	}
	if($qode_options_river['enable_google_map'] == "yes") :
		wp_enqueue_script("google_map_api", "https://maps.googleapis.com/maps/api/js?sensor=false",array(),false,true);
	endif;
	wp_enqueue_script("default_dynamic", QODE_ROOT."/js/default_dynamic.php",array(),false,true);
	wp_enqueue_script("default", QODE_ROOT."/js/default.min.js",array(),false,true);
	wp_enqueue_script("custom_js", QODE_ROOT."/js/custom_js.php",array(),false,true);
	global $wp_scripts;
	$wp_scripts->add_data('comment-reply', 'group', 1 );
	if ( is_singular() ) wp_enqueue_script( "comment-reply");
		
	$has_ajax = false;
	$qode_animation = "";
	if (isset($_SESSION['qode_animation']))
		$qode_animation = $_SESSION['qode_animation'];
	if (($qode_options_river['page_transitions'] != "0") && (empty($qode_animation) || ($qode_animation != "no")))
		$has_ajax = true;
	elseif (!empty($qode_animation) && ($qode_animation != "no"))
		$has_ajax = true;
		
	if ($has_ajax) :
		wp_enqueue_script("ajax", QODE_ROOT."/js/ajax.min.js",array(),false,true);
	endif;
	
	if($qode_options_river['use_recaptcha'] == "yes") :
	wp_enqueue_script("recaptcha_ajax", "http://www.google.com/recaptcha/api/js/recaptcha_ajax.js",array(),false,true);
	endif;
	
	if(isset($qode_toolbar)):
		wp_enqueue_script("toolbar", QODE_ROOT."/js/toolbar.js",array(),false,true);
	endif;
}
}

add_action('wp_enqueue_scripts', 'qode_styles'); 
add_action('wp_enqueue_scripts', 'qode_scripts');

/* Add admin js and css */

if (!function_exists('qode_admin_jquery')) {
function qode_admin_jquery() {
	wp_enqueue_script('jquery'); 
	wp_enqueue_style('style', QODE_ROOT.'/css/admin/admin-style.css', false, '1.0', 'screen');
	wp_enqueue_style('colorstyle', QODE_ROOT.'/css/admin/colorpicker.css', false, '1.0', 'screen');
	wp_register_script('colorpickerss', QODE_ROOT.'/js/admin/colorpicker.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script('colorpickerss'); 
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('jquery-ui-accordion');
	wp_register_script('default', QODE_ROOT.'/js/admin/default.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script('default'); 
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
}
}
add_action('admin_print_scripts', 'qode_admin_jquery');

if (!isset( $content_width )) $content_width = 1060;

/* Remove Generator from head */

remove_action('wp_head', 'wp_generator'); 

/* Register Menus */

if (!function_exists('qode_register_menus')) {
function qode_register_menus() {
    register_nav_menus(
        array('top-navigation' => __( 'Top Navigation', 'qode')
		)
		
    );
}
}
add_action( 'after_setup_theme', 'qode_register_menus' ); 

/* Add post thumbnails */

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'portfolio-square', 520, 520, true );
add_image_size( 'blog-square', 212, 212, true );
add_image_size( 'menu-featured-post', 345, 198, true );
}

/* Add post formats */

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
}

/* Add feedlinks */

add_theme_support( 'automatic-feed-links' );

/* Qode comments */

if (!function_exists('qode_comment')) {
function qode_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment">
		<div class="image"> <?php echo get_avatar($comment, 90); ?> </div>
		<div class="text">
			<h4 class="name"><?php echo get_comment_author_link(); ?></h4>
			<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
				<?php comment_text(); ?>
			</div>
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=>'<i class="icon-reply"></i>' ) ) ); ?>
		</div>
	</div>                          
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation.', 'qode'); ?></em></p>
<?php endif; ?>                
<?php 
}
}
/* Register Sidebar */

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Sidebar',
				'id' => 'sidebar',
        'description' => 'Default Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
				'name' => 'Sidebar Page',
				'id' => 'sidebar_page',
        'description' => 'Sidebar for Page',
        'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
        'name' => 'Header Left',
				'id' => 'header_left',
				'description' => 'Header Left',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
		register_sidebar(array(
        'name' => 'Header Right',
				'id' => 'header_right',
				'description' => 'Header Right',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
		register_sidebar(array(
				'name' => 'Side Area',
				'id' => 'sidearea',
				'description' => 'Side Area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
				'name' => 'Footer Column 1',
				'id' => 'footer_column_1',
        'description' => 'Footer Column 1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
		register_sidebar(array(
				'name' => 'Footer Column 2',
				'id' => 'footer_column_2',
        'description' => 'Footer Column 2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
		register_sidebar(array(
				'name' => 'Footer column 3',
				'id' => 'footer_column_3',
        'description' => 'Footer Column 3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
		register_sidebar(array(
				'name' => 'Footer column 4',
				'id' => 'footer_column_4',
        'description' => 'Footer Column 4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
		register_sidebar(array(
        'name' => 'Footer text',
				'id' => 'footer_text',
        'description' => 'Footer Text',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
}

/* Add class on body for ajax */

if (!function_exists('ajax_classes')) {
function ajax_classes($classes) {
	global $qode_options_river;
	$qode_animation="";
	if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
	if(($qode_options_river['page_transitions'] === "0") && ($qode_animation == "no")) :
		$classes[] = '';
	elseif($qode_options_river['page_transitions'] === "1" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_updown';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_river['page_transitions'] === "2" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_fade';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_river['page_transitions'] === "3" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_updown_fade';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_river['page_transitions'] === "4" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_leftright';
		$classes[] = 'page_not_loaded';
	elseif(!empty($qode_animation) && $qode_animation != "no") :
		$classes[] = 'page_not_loaded';
	else:
	$classes[] ="";
	endif;

	return $classes;
}
}
add_filter('body_class','ajax_classes');

/* Add class on body for smooth scroll */

if (!function_exists('smooth_class')) {
function smooth_class($classes) {
	global $qode_options_river;
	
	$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$mac    = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");
	$android    = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
	$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                    '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
	
	$smooth_scroll = false;
	if(!$isMobile){
		if(isset($qode_options_river['smooth_scroll']) && $qode_options_river['smooth_scroll'] == "yes"){
				$smooth_scroll = true;
		}else if(isset($qode_options_river['smooth_scroll']) && $qode_options_river['smooth_scroll'] == "yes_not_ios"){
				if(!$mac){
					$smooth_scroll = true;
				}
		}
	}
	if (isset($_SESSION['qode_smooth'])) {
		if ($_SESSION['qode_smooth'] == "yes") $smooth_scroll = true;
		else $smooth_scroll = false;
	}
	
	if($smooth_scroll) :
		$classes[] = 'smooth_scroll';
	else:
	$classes[] ="";
	endif;
	
	return $classes;
}
}
add_filter('body_class','smooth_class');

/* Add class on body boxed layout */

if (!function_exists('boxed_class')) {
function boxed_class($classes) {
	global $qode_options_river;
	
	
	if(isset($qode_options_river['boxed']) && $qode_options_river['boxed'] == "yes") :
		$classes[] = 'boxed';
	else:
	$classes[] ="";
	endif;

	return $classes;
}
}
add_filter('body_class','boxed_class');


/* Excerpt more */

if (!function_exists('qode_excerpt_more')) {
function qode_excerpt_more( $more ) {
    return '...';
}
}
add_filter('excerpt_more', 'qode_excerpt_more');

/* Excerpt lenght */

if (!function_exists('qode_excerpt_length')) {
function qode_excerpt_length( $length ) {
	global $qode_options_river;
	if($qode_options_river['number_of_chars']){
		 return $qode_options_river['number_of_chars'];
	} else {
		return 45;
	}
}
}
add_filter( 'excerpt_length', 'qode_excerpt_length', 999 );

/* Social excerpt lenght */

if (!function_exists('the_excerpt_max_charlength')) {
function the_excerpt_max_charlength($charlength) {
	global $qode_options_river;
	$via = $qode_options_river['twitter_via'];
	$excerpt = get_the_excerpt();
	$charlength = 136 - (mb_strlen($via) + $charlength);

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}
	} else {
		return $excerpt;
	}
}
}

/* Create Portfolio post type */

if (!function_exists('create_post_type')) {
function create_post_type() {
	global $qode_options_river;
	$slug = 'portfolio';
	if(isset($qode_options_river['portfolio_single_slug'])) {
		if($qode_options_river['portfolio_single_slug'] != ""){
			$slug = $qode_options_river['portfolio_single_slug'];
		}
	}
	register_post_type( 'portfolio_page',
		array(
			'labels' => array(
				'name' => __( 'Portfolio','qode' ),
				'singular_name' => __( 'Portfolio Item','qode' ),
				'add_item' => __('New Portfolio Item','qode'),
                'add_new_item' => __('Add New Portfolio Item','qode'),
                'edit_item' => __('Edit Portfolio Item','qode')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => $slug),
			'menu_position' => 4,
			'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'tags'),
			'taxonomies' => array('post_tag')
		)
	);
	register_post_type('testimonials',
		array(
			'labels' => array(
				'name' 				=> __('Testimonials','qode' ),
				'singular_name' 	=> __('Testimonial','qode' ),
				'add_item'			=> __('New Testimonial','qode'),
				'add_new_item' 		=> __('Add New Testimonial','qode'),
				'edit_item' 		=> __('Edit Testimonial','qode')
			),
			'public'		=>	false,
			'show_in_menu'	=>	true, 
			'rewrite' 		=> 	array('slug' => 'testimonials'),
			'menu_position' => 	4,
			'show_ui'		=>	true,
			'has_archive'	=>	false, 
			'hierarchical'	=>	false,
            'supports'		=>	array('title', 'tags')
		)
	);

}
}
add_action( 'init', 'create_post_type' );

/* Create Portfolio Categories */

add_action( 'after_setup_theme', 'create_portfolio_taxonomies', 0 );
if (!function_exists('create_portfolio_taxonomies')) {
function create_portfolio_taxonomies() 
{
   $labels = array(
    'name' => __( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Portfolio Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Categories','qode' ),
    'all_items' => __( 'All Portfolio Categories','qode' ),
    'parent_item' => __( 'Parent Portfolio Category','qode' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:','qode' ),
    'edit_item' => __( 'Edit Portfolio Category','qode' ), 
    'update_item' => __( 'Update Portfolio Category','qode' ),
    'add_new_item' => __( 'Add New Portfolio Category','qode' ),
    'new_item_name' => __( 'New Portfolio Category Name','qode' ),
    'menu_name' => __( 'Portfolio Categories','qode' ),
  );     

  register_taxonomy('portfolio_category',array('portfolio_page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio-category' ),
  ));

}
}

/* Create Testimonials Category */

add_action( 'after_setup_theme', 'create_testimonials_taxonomies', 0 );
if (!function_exists('create_testimonials_taxonomies')) {
function create_testimonials_taxonomies() 
{
   $labels = array(
    'name' => __( 'Testimonials Categories', 'taxonomy general name' ),
    'singular_name' => __( 'Testimonial Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Testimonials Categories','qode' ),
    'all_items' => __( 'All Testimonials Categories','qode' ),
    'parent_item' => __( 'Parent Testimonial Category','qode' ),
    'parent_item_colon' => __( 'Parent Testimonial Category:','qode' ),
    'edit_item' => __( 'Edit Testimonials Category','qode' ), 
    'update_item' => __( 'Update Testimonials Category','qode' ),
    'add_new_item' => __( 'Add New Testimonials Category','qode' ),
    'new_item_name' => __( 'New Testimonials Category Name','qode' ),
    'menu_name' => __( 'Testimonials Categories','qode' ),
  );     

  register_taxonomy('testimonials_category',array('testimonials'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'show_admin_column' => true,
    'rewrite' => array( 'slug' => 'testimonials-category' ),
  ));

}
}

/* Flush permalinks */

function rewrite_rules_on_theme_activation() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'rewrite_rules_on_theme_activation' );

/* Pagination */

if (!function_exists('pagination')) {
function pagination($pages = '', $range = 4, $paged = 1){  
	global $qode_options_river;
    $showitems = $range+1;  
 
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
        }
    }   
 
    if(1 != $pages){
        echo "<div class='pagination'><ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a href='".get_pagenum_link(1)."'><i class='icon-chevron-left'></i><i class='icon-chevron-left'></i></a></li>";
		echo "<li class='prev";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
			echo " prev_first";
		}
		echo "'><a href='".get_pagenum_link($paged - 1)."'><i class='icon-chevron-left'></i></a></li>";
 
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
            }
        }
		
        echo "<li class='next";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
			echo " next_last";
		}
		echo "'><a href=\"";
		if($pages > $paged){
			echo get_pagenum_link($paged + 1);
		} else {
			echo get_pagenum_link($paged);
		}
		echo "\"><i class='icon-chevron-right'></i></a></li>";  
		 
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a href='".get_pagenum_link($pages)."'><i class='icon-chevron-right'></i><i class='icon-chevron-right'></i></a></li>";
        echo "</ul></div>\n";
    }
}
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/* Empty paragraph fix in shortcode */

if (!function_exists('shortcode_empty_paragraph_fix')) {
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
}

/* Use slider instead of image for post */

if (!function_exists('slider_blog')) {
function slider_blog($post_id) {
	$sliders = get_post_meta($post_id, "qode_sliders", true);		
	$slider = $sliders[1];
	if($slider) {
		$html .= '<div class="flexslider"><ul class="slides">';
		$i=0;
		while (isset($slider[$i])){
			$slide = $slider[$i];
			
			$href = $slide[link];
			$baseurl = home_url();
			$baseurl = str_replace('http://', '', $baseurl);
			$baseurl = str_replace('www', '', $baseurl);
			$host = parse_url($href, PHP_URL_HOST);
			if($host != $baseurl) {
				$target = 'target="_blank"';
			}
			else {
				$target = 'target="_self"';
			}
			
			$html .= '<li class="slide ' . $slide[imgsize] . '">';
			$html .= '<div class="image"><img src="' . $slide[img] . '" alt="' . $slide[title] . '" /></div>';
			
			$html .= '</li>';
			$i++; 
		}
		$html .= '</ul></div>';
	}
	return $html;
}
}

if (!function_exists('compareSlides')) {
function compareSlides($a, $b){
	if (isset($a['ordernumber']) && isset($b['ordernumber'])) {
    if ($a['ordernumber'] == $b['ordernumber']) {
        return 0;
    }
    return ($a['ordernumber'] < $b['ordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('comparePortfolioImages')) {
function comparePortfolioImages($a, $b){
	if (isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
    if ($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
        return 0;
    }
    return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('comparePortfolioOptions')){
function comparePortfolioOptions($a, $b){
	if (isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
    if ($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
        return 0;
    }
    return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('getFontAwesomeIconArray')){
	function getFontAwesomeIconArray(){
		$icons = array (
			'icon-glass' => '\\f000',
			'icon-music' => '\\f001',
			'icon-search' => '\\f002',
			'icon-envelope-alt' => '\\f003',
			'icon-heart' => '\\f004',
			'icon-star' => '\\f005',
			'icon-star-empty' => '\\f006',
			'icon-user' => '\\f007',
			'icon-film' => '\\f008',
			'icon-th-large' => '\\f009',
			'icon-th' => '\\f00a',
			'icon-th-list' => '\\f00b',
			'icon-ok' => '\\f00c',
			'icon-remove' => '\\f00d',
			'icon-zoom-in' => '\\f00e',
			'icon-zoom-out' => '\\f010',
			'icon-off' => '\\f011',
			'icon-signal' => '\\f012',
			'icon-cog' => '\\f013',
			'icon-trash' => '\\f014',
			'icon-home' => '\\f015',
			'icon-file-alt' => '\\f016',
			'icon-time' => '\\f017',
			'icon-road' => '\\f018',
			'icon-download-alt' => '\\f019',
			'icon-download' => '\\f01a',
			'icon-upload' => '\\f01b',
			'icon-inbox' => '\\f01c',
			'icon-play-circle' => '\\f01d',
			'icon-repeat' => '\\f01e',
			'icon-refresh' => '\\f021',
			'icon-list-alt' => '\\f022',
			'icon-lock' => '\\f023',
			'icon-flag' => '\\f024',
			'icon-headphones' => '\\f025',
			'icon-volume-off' => '\\f026',
			'icon-volume-down' => '\\f027',
			'icon-volume-up' => '\\f028',
			'icon-qrcode' => '\\f029',
			'icon-barcode' => '\\f02a',
			'icon-tag' => '\\f02b',
			'icon-tags' => '\\f02c',
			'icon-book' => '\\f02d',
			'icon-bookmark' => '\\f02e',
			'icon-print' => '\\f02f',
			'icon-camera' => '\\f030',
			'icon-font' => '\\f031',
			'icon-bold' => '\\f032',
			'icon-italic' => '\\f033',
			'icon-text-height' => '\\f034',
			'icon-text-width' => '\\f035',
			'icon-align-left' => '\\f036',
			'icon-align-center' => '\\f037',
			'icon-align-right' => '\\f038',
			'icon-align-justify' => '\\f039',
			'icon-list' => '\\f03a',
			'icon-indent-left' => '\\f03b',
			'icon-indent-right' => '\\f03c',
			'icon-facetime-video' => '\\f03d',
			'icon-picture' => '\\f03e',
			'icon-pencil' => '\\f040',
			'icon-map-marker' => '\\f041',
			'icon-adjust' => '\\f042',
			'icon-tint' => '\\f043',
			'icon-edit' => '\\f044',
			'icon-share' => '\\f045',
			'icon-check' => '\\f046',
			'icon-move' => '\\f047',
			'icon-step-backward' => '\\f048',
			'icon-fast-backward' => '\\f049',
			'icon-backward' => '\\f04a',
			'icon-play' => '\\f04b',
			'icon-pause' => '\\f04c',
			'icon-stop' => '\\f04d',
			'icon-forward' => '\\f04e',
			'icon-fast-forward' => '\\f050',
			'icon-step-forward' => '\\f051',
			'icon-eject' => '\\f052',
			'icon-chevron-left' => '\\f053',
			'icon-chevron-right' => '\\f054',
			'icon-plus-sign' => '\\f055',
			'icon-minus-sign' => '\\f056',
			'icon-remove-sign' => '\\f057',
			'icon-ok-sign' => '\\f058',
			'icon-question-sign' => '\\f059',
			'icon-info-sign' => '\\f05a',
			'icon-screenshot' => '\\f05b',
			'icon-remove-circle' => '\\f05c',
			'icon-ok-circle' => '\\f05d',
			'icon-ban-circle' => '\\f05e',
			'icon-arrow-left' => '\\f060',
			'icon-arrow-right' => '\\f061',
			'icon-arrow-up' => '\\f062',
			'icon-arrow-down' => '\\f063',
			'icon-share-alt' => '\\f064',
			'icon-resize-full' => '\\f065',
			'icon-resize-small' => '\\f066',
			'icon-plus' => '\\f067',
			'icon-minus' => '\\f068',
			'icon-asterisk' => '\\f069',
			'icon-exclamation-sign' => '\\f06a',
			'icon-gift' => '\\f06b',
			'icon-leaf' => '\\f06c',
			'icon-fire' => '\\f06d',
			'icon-eye-open' => '\\f06e',
			'icon-eye-close' => '\\f070',
			'icon-warning-sign' => '\\f071',
			'icon-plane' => '\\f072',
			'icon-calendar' => '\\f073',
			'icon-random' => '\\f074',
			'icon-comment' => '\\f075',
			'icon-magnet' => '\\f076',
			'icon-chevron-up' => '\\f077',
			'icon-chevron-down' => '\\f078',
			'icon-retweet' => '\\f079',
			'icon-shopping-cart' => '\\f07a',
			'icon-folder-close' => '\\f07b',
			'icon-folder-open' => '\\f07c',
			'icon-resize-vertical' => '\\f07d',
			'icon-resize-horizontal' => '\\f07e',
			'icon-bar-chart' => '\\f080',
			'icon-twitter-sign' => '\\f081',
			'icon-facebook-sign' => '\\f082',
			'icon-camera-retro' => '\\f083',
			'icon-key' => '\\f084',
			'icon-cogs' => '\\f085',
			'icon-comments' => '\\f086',
			'icon-thumbs-up-alt' => '\\f087',
			'icon-thumbs-down-alt' => '\\f088',
			'icon-star-half' => '\\f089',
			'icon-heart-empty' => '\\f08a',
			'icon-signout' => '\\f08b',
			'icon-linkedin-sign' => '\\f08c',
			'icon-pushpin' => '\\f08d',
			'icon-external-link' => '\\f08e',
			'icon-signin' => '\\f090',
			'icon-trophy' => '\\f091',
			'icon-github-sign' => '\\f092',
			'icon-upload-alt' => '\\f093',
			'icon-lemon' => '\\f094',
			'icon-phone' => '\\f095',
			'icon-check-empty' => '\\f096',
			'icon-bookmark-empty' => '\\f097',
			'icon-phone-sign' => '\\f098',
			'icon-twitter' => '\\f099',
			'icon-facebook' => '\\f09a',
			'icon-github' => '\\f09b',
			'icon-unlock' => '\\f09c',
			'icon-credit-card' => '\\f09d',
			'icon-rss' => '\\f09e',
			'icon-hdd' => '\\f0a0',
			'icon-bullhorn' => '\\f0a1',
			'icon-bell' => '\\f0a2',
			'icon-certificate' => '\\f0a3',
			'icon-hand-right' => '\\f0a4',
			'icon-hand-left' => '\\f0a5',
			'icon-hand-up' => '\\f0a6',
			'icon-hand-down' => '\\f0a7',
			'icon-circle-arrow-left' => '\\f0a8',
			'icon-circle-arrow-right' => '\\f0a9',
			'icon-circle-arrow-up' => '\\f0aa',
			'icon-circle-arrow-down' => '\\f0ab',
			'icon-globe' => '\\f0ac',
			'icon-wrench' => '\\f0ad',
			'icon-tasks' => '\\f0ae',
			'icon-filter' => '\\f0b0',
			'icon-briefcase' => '\\f0b1',
			'icon-fullscreen' => '\\f0b2',
			'icon-group' => '\\f0c0',
			'icon-link' => '\\f0c1',
			'icon-cloud' => '\\f0c2',
			'icon-beaker' => '\\f0c3',
			'icon-cut' => '\\f0c4',
			'icon-copy' => '\\f0c5',
			'icon-paper-clip' => '\\f0c6',
			'icon-save' => '\\f0c7',
			'icon-sign-blank' => '\\f0c8',
			'icon-reorder' => '\\f0c9',
			'icon-list-ul' => '\\f0ca',
			'icon-list-ol' => '\\f0cb',
			'icon-strikethrough' => '\\f0cc',
			'icon-underline' => '\\f0cd',
			'icon-table' => '\\f0ce',
			'icon-magic' => '\\f0d0',
			'icon-truck' => '\\f0d1',
			'icon-pinterest' => '\\f0d2',
			'icon-pinterest-sign' => '\\f0d3',
			'icon-google-plus-sign' => '\\f0d4',
			'icon-google-plus' => '\\f0d5',
			'icon-money' => '\\f0d6',
			'icon-caret-down' => '\\f0d7',
			'icon-caret-up' => '\\f0d8',
			'icon-caret-left' => '\\f0d9',
			'icon-caret-right' => '\\f0da',
			'icon-columns' => '\\f0db',
			'icon-sort' => '\\f0dc',
			'icon-sort-down' => '\\f0dd',
			'icon-sort-up' => '\\f0de',
			'icon-envelope' => '\\f0e0',
			'icon-linkedin' => '\\f0e1',
			'icon-undo' => '\\f0e2',
			'icon-legal' => '\\f0e3',
			'icon-dashboard' => '\\f0e4',
			'icon-comment-alt' => '\\f0e5',
			'icon-comments-alt' => '\\f0e6',
			'icon-bolt' => '\\f0e7',
			'icon-sitemap' => '\\f0e8',
			'icon-umbrella' => '\\f0e9',
			'icon-paste' => '\\f0ea',
			'icon-lightbulb' => '\\f0eb',
			'icon-exchange' => '\\f0ec',
			'icon-cloud-download' => '\\f0ed',
			'icon-cloud-upload' => '\\f0ee',
			'icon-user-md' => '\\f0f0',
			'icon-stethoscope' => '\\f0f1',
			'icon-suitcase' => '\\f0f2',
			'icon-bell-alt' => '\\f0f3',
			'icon-coffee' => '\\f0f4',
			'icon-food' => '\\f0f5',
			'icon-file-text-alt' => '\\f0f6',
			'icon-building' => '\\f0f7',
			'icon-hospital' => '\\f0f8',
			'icon-ambulance' => '\\f0f9',
			'icon-medkit' => '\\f0fa',
			'icon-fighter-jet' => '\\f0fb',
			'icon-beer' => '\\f0fc',
			'icon-h-sign' => '\\f0fd',
			'icon-plus-sign-alt' => '\\f0fe',
			'icon-double-angle-left' => '\\f100',
			'icon-double-angle-right' => '\\f101',
			'icon-double-angle-up' => '\\f102',
			'icon-double-angle-down' => '\\f103',
			'icon-angle-left' => '\\f104',
			'icon-angle-right' => '\\f105',
			'icon-angle-up' => '\\f106',
			'icon-angle-down' => '\\f107',
			'icon-desktop' => '\\f108',
			'icon-laptop' => '\\f109',
			'icon-tablet' => '\\f10a',
			'icon-mobile-phone' => '\\f10b',
			'icon-circle-blank' => '\\f10c',
			'icon-quote-left' => '\\f10d',
			'icon-quote-right' => '\\f10e',
			'icon-spinner' => '\\f110',
			'icon-circle' => '\\f111',
			'icon-reply' => '\\f112',
			'icon-github-alt' => '\\f113',
			'icon-folder-close-alt' => '\\f114',
			'icon-folder-open-alt' => '\\f115',
			'icon-expand-alt' => '\\f116',
			'icon-collapse-alt' => '\\f117',
			'icon-smile' => '\\f118',
			'icon-frown' => '\\f119',
			'icon-meh' => '\\f11a',
			'icon-gamepad' => '\\f11b',
			'icon-keyboard' => '\\f11c',
			'icon-flag-alt' => '\\f11d',
			'icon-flag-checkered' => '\\f11e',
			'icon-terminal' => '\\f120',
			'icon-code' => '\\f121',
			'icon-reply-all' => '\\f122',
			'icon-mail-reply-all' => '\\f122',
			'icon-star-half-empty' => '\\f123',
			'icon-location-arrow' => '\\f124',
			'icon-crop' => '\\f125',
			'icon-code-fork' => '\\f126',
			'icon-unlink' => '\\f127',
			'icon-question' => '\\f128',
			'icon-info' => '\\f129',
			'icon-exclamation' => '\\f12a',
			'icon-superscript' => '\\f12b',
			'icon-subscript' => '\\f12c',
			'icon-eraser' => '\\f12d',
			'icon-puzzle-piece' => '\\f12e',
			'icon-microphone' => '\\f130',
			'icon-microphone-off' => '\\f131',
			'icon-shield' => '\\f132',
			'icon-calendar-empty' => '\\f133',
			'icon-fire-extinguisher' => '\\f134',
			'icon-rocket' => '\\f135',
			'icon-maxcdn' => '\\f136',
			'icon-chevron-sign-left' => '\\f137',
			'icon-chevron-sign-right' => '\\f138',
			'icon-chevron-sign-up' => '\\f139',
			'icon-chevron-sign-down' => '\\f13a',
			'icon-html5' => '\\f13b',
			'icon-css3' => '\\f13c',
			'icon-anchor' => '\\f13d',
			'icon-unlock-alt' => '\\f13e',
			'icon-bullseye' => '\\f140',
			'icon-ellipsis-horizontal' => '\\f141',
			'icon-ellipsis-vertical' => '\\f142',
			'icon-rss-sign' => '\\f143',
			'icon-play-sign' => '\\f144',
			'icon-ticket' => '\\f145',
			'icon-minus-sign-alt' => '\\f146',
			'icon-check-minus' => '\\f147',
			'icon-level-up' => '\\f148',
			'icon-level-down' => '\\f149',
			'icon-check-sign' => '\\f14a',
			'icon-edit-sign' => '\\f14b',
			'icon-external-link-sign' => '\\f14c',
			'icon-share-sign' => '\\f14d',
			'icon-compass' => '\\f14e',
			'icon-collapse' => '\\f150',
			'icon-collapse-top' => '\\f151',
			'icon-expand' => '\\f152',
			'icon-eur' => '\\f153',
			'icon-gbp' => '\\f154',
			'icon-usd' => '\\f155',
			'icon-inr' => '\\f156',
			'icon-jpy' => '\\f157',
			'icon-cny' => '\\f158',
			'icon-krw' => '\\f159',
			'icon-btc' => '\\f15a',
			'icon-file' => '\\f15b',
			'icon-file-text' => '\\f15c',
			'icon-sort-by-alphabet' => '\\f15d',
			'icon-sort-by-alphabet-alt' => '\\f15e',
			'icon-sort-by-attributes' => '\\f160',
			'icon-sort-by-attributes-alt' => '\\f161',
			'icon-sort-by-order' => '\\f162',
			'icon-sort-by-order-alt' => '\\f163',
			'icon-thumbs-up' => '\\f164',
			'icon-thumbs-down' => '\\f165',
			'icon-youtube-sign' => '\\f166',
			'icon-youtube' => '\\f167',
			'icon-xing' => '\\f168',
			'icon-xing-sign' => '\\f169',
			'icon-youtube-play' => '\\f16a',
			'icon-dropbox' => '\\f16b',
			'icon-stackexchange' => '\\f16c',
			'icon-instagram' => '\\f16d',
			'icon-flickr' => '\\f16e',
			'icon-adn' => '\\f170',
			'icon-bitbucket' => '\\f171',
			'icon-bitbucket-sign' => '\\f172',
			'icon-tumblr' => '\\f173',
			'icon-tumblr-sign' => '\\f174',
			'icon-long-arrow-down' => '\\f175',
			'icon-long-arrow-up' => '\\f176',
			'icon-long-arrow-left' => '\\f177',
			'icon-long-arrow-right' => '\\f178',
			'icon-apple' => '\\f179',
			'icon-windows' => '\\f17a',
			'icon-android' => '\\f17b',
			'icon-linux' => '\\f17c',
			'icon-dribbble' => '\\f17d',
			'icon-skype' => '\\f17e',
			'icon-foursquare' => '\\f180',
			'icon-trello' => '\\f181',
			'icon-female' => '\\f182',
			'icon-male' => '\\f183',
			'icon-gittip' => '\\f184',
			'icon-sun' => '\\f185',
			'icon-moon' => '\\f186',
			'icon-archive' => '\\f187',
			'icon-bug' => '\\f188',
			'icon-vk' => '\\f189',
			'icon-weibo' => '\\f18a',
			'icon-renren' => '\\f18b',
	);
        ksort($icons);
        return $icons;
	}
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if (!function_exists('my_theme_register_required_plugins')) {
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'LayerSlider WP', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/layersliderwp-5.1.1.installable.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		// array(
			// 'name' 		=> 'BuddyPress',
			// 'slug' 		=> 'buddypress',
			// 'required' 	=> false,
		// ),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'river';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}
}

add_action( 'tgmpa_register', 'my_theme_register_js_composer_plugins' );

function my_theme_register_js_composer_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'			=> 'WPBakery Visual Composer', // The plugin name
			'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
			'source'			=> get_stylesheet_directory() . '/plugins/js_composer.zip', // The plugin source
			'required'			=> true, // If false, the plugin is only 'recommended' instead of required
			'version'			=> '4.1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'		=> '', // If set, overrides default API URL and points to an external URL
		)
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'		=> $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path'		=> '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug'	=> 'themes.php', // Default parent menu slug
		'parent_url_slug'	=> 'themes.php', // Default parent URL slug
		'menu'			=> 'install-required-plugins', // Menu slug
		'has_notices'		=> true, // Show admin notices or not
		'is_automatic'		=> false, // Automatically activate plugins after installation or not
		'message'		=> '', // Message to output right before the plugins table
		'strings'		=> array(
			'page_title'			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'				=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'	=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'	=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'		=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'	=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'	=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate'		=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update'		=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update'		=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link'			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'				=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'				=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'				=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa( $plugins, $config );
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) vc_set_as_theme();

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/extendvc/extend-vc.php');
	}
	add_action('init', 'requireVcExtend',2);
}


if (!function_exists('hex2rgb')) {
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
}

// register custom sidebars to theme
add_theme_support('qode_sidebar');
if(get_theme_support( 'qode_sidebar' )) new qode_sidebar();

if (!function_exists('isUserMadeSidebar')) {
function isUserMadeSidebar($name){
	
	//this have to be changed depending on theme
	if($name == 'Sidebar'){
		return false;
	}else if($name == 'Sidebar Page'){
		return false;
	}else if($name == 'Header Left'){
		return false;	
	}else if($name == 'Header Right'){
		return false;
	}else if($name == 'Side Area'){
		return false;
	}else if($name == 'Footer Column 1'){
		return false;
	}else if($name == 'Footer Column 2'){
		return false;
	}else if($name == 'Footer Column 3'){
		return false;
	}else if($name == 'Footer Column 4'){
		return false;
	}else if($name == 'Footer Text'){
		return false;
	}else{
		return true;
	}
}
}

?>