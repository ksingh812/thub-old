<?php 
global $qode_options_river; 

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
if(isset($qode_options_river['title_style'])) {
	$qode_page_title_style = $qode_options_river['title_style'];
} else {
	$qode_page_title_style = "1";
}
$height_class = "";
if($qode_page_title_style == "2") {
	$height_class = " with_breadcrumbs";
}else{
	$height_class = " standard";
}

?>	

<?php get_header(); ?>
			<div class="title<?php echo $height_class; ?> <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes" && $show_title_image == true){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true){ echo 'has_background'; } if($responsive_title_image == 'yes' && $show_title_image == true){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != "" && $show_title_image == true){ echo 'background-image:url('.$title_image.');';  } if($title_height != ''){ echo 'height:'.$title_height.'px;'; } if($title_background_color != ''){ echo 'background-color:'.$title_background_color.';'; } ?>">
				<?php if($responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<div class="title_holder">
					<div class="container">
						<div class="container_inner clearfix">
							<?php if($qode_page_title_style == "2") {  ?>
								<?php if (function_exists('qode_custom_breadcrumbs')) { ?> <div class="breadcrumb"> <?php qode_custom_breadcrumbs(); ?></div><?php } ?>
								<span class="subtitle"> <?php if(isset($qode_options_river['404_subtitle']) && $qode_options_river['404_subtitle'] != "") { ?> <?php echo $qode_options_river['404_subtitle']; ?><?php } else { ?><?php _e('Page not found', 'qode'); ?><?php } ?></span>
							<?php } else { ?>
								<h6><?php if(isset($qode_options_river['404_subtitle']) && $qode_options_river['404_subtitle'] != "") { ?> <?php echo $qode_options_river['404_subtitle']; ?><?php } else { ?><?php _e('Page not found', 'qode'); ?><?php } ?></h6>
								<h1><?php if($qode_options_river['404_title'] != ""): echo $qode_options_river['404_title']; else: ?> <?php _e('404', 'qode'); ?> <?php endif;?></h1>
								<span class="separator small"></span>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="container_inner clearfix">
				<div class="sf_container">
				<div><label class="screen-reader-text" for="s">Search for Artists, Sports Events, or Venues:</label>
				<div class="sf_search" style="border:1px solid #dddddd"><span class="sf_block">
				<center><input style="width:280px; height:50px; border-radius:5px; height:25px;" class="sf_input" autocomplete="off" type="text" value="Search" name="s"></center>
				<button class="sf_button searchsubmit" type="submit"><span class="sf_hidden">Search</span></button></span></div></div></div>
			</div>
			</div>
			<div class="container">
				<div class="container_inner">
					<div class="page_not_found">
						<h2><?php if($qode_options_river['404_text'] != ""): echo $qode_options_river['404_text']; else: ?> <?php _e('The page you requested does not exist', 'qode'); ?> <?php endif;?></h2>
						<p><a class="qbutton with-shadow" href="<?php echo home_url(); ?>/"><?php if($qode_options_river['404_backlabel'] != ""): echo $qode_options_river['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	