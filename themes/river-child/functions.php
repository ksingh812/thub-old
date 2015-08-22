<?php
define('QODE_ROOT', get_stylesheet_directory_uri());

/* Add css */
function qode_styles() {
	global $qode_options_river;
	global $wp_styles;
	global $qode_toolbar;
	global $woocommerce;

        wp_enqueue_style("default_style", QODE_ROOT . "/style.css");
        wp_enqueue_style("font-awesome", QODE_ROOT . "/css/font-awesome/css/font-awesome.min.css");
        wp_enqueue_style("stylesheet", QODE_ROOT . "/css/stylesheet.css");

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
		printf("<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:300italic,400:italic,400%s&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n", str_replace(' ', '+', $google_fonts_string));
	else :
		printf("<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:300italic,400:italic,400&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n");
	endif;
}
	add_action('wp_enqueue_scripts', 'qode_styles', 11); 
	
// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'naw_post_shortcode' );
function naw_post_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'date',
        'orderby' => 'title',
        'posts' => -1,
        'tag' => 'featured',
        'fabric' => '',
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'tag' => $tag,
        'fabric' => $fabric,
        'category_name' => $category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
             <ul class="eventlist">
               <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<li>
						 <div itemscope itemtype="http://schema.org/Event">
							 <a itemprop="url" href="<?php the_permalink();?>" title="<?php the_title(); ?> Tickets"><?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?> <img itemprop="image" src="<?php echo $url; ?>" alt="<?php the_title();?>" class="thumb" /><span itemprop="name"><?php the_title(); ?></span><span itemprop="offers" style="float:right;"><i class="icon-ticket"></i></span></a>
						 </div>
						 </li>
	<?php endwhile; ?>
            </ul>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

//[list-posts type="press" orderby="name" order="ASC" posts="5"]

#ADD-META-BOXES
function cd_add_tkthub_meta(){
    add_meta_box( 'tkthub-meta', __( 'Event Detail' ), 'cd_tkthub_meta_cb', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'cd_add_tkthub_meta' );
#RENDER META-BOX
function cd_tkthub_meta_cb( $post ){
		
	$rsr_title = get_post_meta( $post->ID, '_cd_rsr_title_content', true );
	// Nonce to verify intention later
    wp_nonce_field( 'save_tkthub_meta', 'tkthub_nonce' );	?>	
	<p>
        <label for="rsr-title-content">Artist Name:</label>
        <input type="text" class="widefat" id="rsr-title-content" name="_cd_rsr_title_content" value="<?php echo $rsr_title; ?>">
    </p>
    <?php
}

#SAVE-META-BOX-VALUES
    function cd_tkthub_meta_save( $id ){
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if( !isset( $_POST['tkthub_nonce'] ) || !wp_verify_nonce( $_POST['tkthub_nonce'], 'save_tkthub_meta' ) ) return;     
        if( !current_user_can( 'edit_post' ) ) return;
        // now we can actually save the data
        $allowed = array( 
            'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                    ),
            'ul' => array(),
            'li' => array(),
            'img' => array(),
            'b' => array(),
        );     
        if( isset( $_POST['_cd_rsr_title_content'] ) )
            update_post_meta( $id, '_cd_rsr_title_content', wp_kses( $_POST['_cd_rsr_title_content'], $allowed) );
    }	
    add_action( 'save_post', 'cd_tkthub_meta_save' );

remove_action('wp_head', 'wp_generator');
/**
* Creates sharethis shortcode
*/
if (function_exists('st_makeEntries')) :
add_shortcode('sharethis', 'st_makeEntries');
endif;
?>