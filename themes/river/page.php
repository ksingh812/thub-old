<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_river['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_river['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_river['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_river['title_height'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_river['fixed_title_image'];
}

$title_background_color = '';
if(get_post_meta($id, "qode_page-title-background-color", true) != ""){
 $title_background_color = get_post_meta($id, "qode_page-title-background-color", true);
}else{
	$title_background_color = $qode_options_river['title_background_color'];
}

$show_title_image = true;
if(get_post_meta($id, "qode_show-page-title-image", true)) {
	$show_title_image = false;
}
$qode_page_title_style = "1";
if(get_post_meta($id, "qode_page_title_style", true) != ""){
	$qode_page_title_style = get_post_meta($id, "qode_page_title_style", true);
}	else{
	if(isset($qode_options_river['title_style'])) {
		$qode_page_title_style = $qode_options_river['title_style'];
	} else {
		$qode_page_title_style = "1";
	}
}
$height_class = "";
if($qode_page_title_style == "2") {
	$height_class = " with_breadcrumbs";
}else{
	$height_class = " standard";
}

?>
	<?php get_header(); ?>
		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
			<div class="title<?php echo $height_class; ?> <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes" && $show_title_image == true){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true){ echo 'has_background'; } if($responsive_title_image == 'yes' && $show_title_image == true){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != "" && $show_title_image == true){ echo 'background-image:url('.$title_image.');';  } if($title_height != ''){ echo 'height:'.$title_height.'px;'; } if($title_background_color != ''){ echo 'background-color:'.$title_background_color.';'; } ?>">
				<?php if($responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
					<div class="title_holder">
						<div class="container">
							<div class="container_inner clearfix">
								<?php if($qode_page_title_style == "2") {  ?>
									<?php if (function_exists('qode_custom_breadcrumbs')) { ?> <div class="breadcrumb"<?php if(get_post_meta($id, "qode_page_breadcrumb_color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page_breadcrumb_color", true) ?>" <?php } ?>> <?php qode_custom_breadcrumbs(); ?></div><?php } ?>
									<?php if(get_post_meta($id, "qode_page_subtitle", true)) { ?><span class="subtitle" <?php if(get_post_meta($id, "qode_page_subtitle_color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page_subtitle_color", true) ?>" <?php } ?>> <?php echo get_post_meta($id, "qode_page_subtitle", true) ?></span><?php } ?>
								<?php } else { ?>
									<?php if(get_post_meta($id, "qode_page_subtitle", true)) { ?><h6 <?php if(get_post_meta($id, "qode_page_subtitle_color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page_subtitle_color", true) ?>" <?php } ?>> <?php echo get_post_meta($id, "qode_page_subtitle", true) ?></h6><?php } ?>
									<h1<?php if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><?php the_title(); ?></h1>	
									<span class="separator small"></span>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		
		<?php if($qode_options_river['show_back_button'] == "yes") { ?>
			<a id='back_to_top' href='#'>
				<span class="icon-stack">
					<i class="icon-chevron-up " style=""></i>
				</span>
			</a>
		<?php } ?>
		
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){ ?>
			<div class="slider"><div class="slider_inner">
			<?php echo do_shortcode($revslider); ?>
			</div></div>
		<?php
		}
		?>
		<div class="container">
			<div class="container_inner clearfix">
				
				
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
					<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
							<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
							<?php endwhile; ?>
						<?php endif; ?>
				<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		
					
					<?php if($sidebar == "1") : ?>	
						<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
					<?php elseif($sidebar == "2") : ?>	
						<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
							<div class="column1">
					<?php endif; ?>
							<?php if (have_posts()) : 
								while (have_posts()) : the_post(); ?>
								<div class="column_inner">
								
								<?php the_content(); ?>
								<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
								</div>
						<?php endwhile; ?>
						<?php endif; ?>
					
									
							</div>
							<div class="column2"><?php get_sidebar();?></div>
						</div>
					<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
						<?php if($sidebar == "3") : ?>	
							<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php elseif($sidebar == "4") : ?>	
							<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php endif; ?>
								<?php if (have_posts()) : 
									while (have_posts()) : the_post(); ?>
									<div class="column_inner">
									<?php the_content(); ?>
									<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
									</div>
							<?php endwhile; ?>
							<?php endif; ?>
						
										
								</div>
								
							</div>
					<?php endif; ?>
			
		</div>
	</div>
	<?php get_footer(); ?>			