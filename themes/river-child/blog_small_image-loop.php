<?php 
global $qode_options_river;
$blog_hide_comments = "";
if (isset($qode_options_river['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_river['blog_hide_comments'];
}
$qode_like = "on";
if (isset($qode_options_river['qode_like'])) {
	$qode_like = $qode_options_river['qode_like'];
}
?>
<?php
$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
				<?php $video_height = 280; ?>
				<?php if($_video_type == "youtube") { ?>
					<iframe height="<?php echo $video_height; ?>" src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe height="<?php echo $video_height; ?>" src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } ?>
			</div>
			<div class="post_text">
				<div class="post_inner">
					<h2><span class="date"><?php the_time('d M'); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<span class="post_infos">
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
					<?php the_excerpt(); ?>
					<div class="post_icons_holder">
						<?php echo do_shortcode('[social_share]'); ?>
						<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <?php comments_number( '0', '1', '%'); ?></a><?php } ?>
						<span class="post_social">
							<?php if( $qode_like == "on" ) { ?>
								<span class="blog_like">
									 <?php if(function_exists('qode_like')) { qode_like(); } ?>
								</span>
							<?php } ?>
						</span>	
					</div>
					<span class="qbutton_holder"><a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('READ MORE','qode'); ?></a></span>
				</div>
			</div>
		</article>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
				<?php } else  { ?>
					<a href="<?php the_permalink(); ?>" target="_self">
						<i class="icon-music"></i>
					</a>
				<?php } ?>
			</div>
			<div class="post_text">
				<div class="post_inner">
					<h2><span class="date"><?php the_time('d M'); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<span class="post_infos">
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
					<?php the_excerpt(); ?>
					<div class="post_icons_holder">
						<?php echo do_shortcode('[social_share]'); ?>
						<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <?php comments_number( '0', '1', '%'); ?></a><?php } ?>
						<span class="post_social">
							<?php if( $qode_like == "on" ) { ?>
								<span class="blog_like">
									 <?php if(function_exists('qode_like')) { qode_like(); } ?>
								</span>
							<?php } ?>
						</span>	
					</div>
					<span class="qbutton_holder"><a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('READ MORE','qode'); ?></a></span>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
				<?php } else  { ?>
					<a href="<?php the_permalink(); ?>" target="_self">
						<i class="icon-link"></i>
					</a>
				<?php } ?>
			</div>
			<div class="post_text">
				<div class="post_inner">
					<div class="post_text_holder">
						<i class="link_mark icon-link pull-left"></i>
						<div class="post_description">
							<div class="post_icons_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <?php comments_number( '0', '1', '%'); ?></a><?php } ?>
								<span class="post_social">
									<?php if( $qode_like == "on" ) { ?>
										<span class="blog_like">
											 <?php if(function_exists('qode_like')) { qode_like(); } ?>
										</span>
									<?php } ?>
								</span>	
							</div>	
							<span class="post_infos">
								<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span> 
								<?php _e(' | ','qode'); ?> <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
								<?php _e(' | ','qode'); ?><?php the_author_meta('display_name'); ?>
							</span>
						</div>
						<div class="post_title">
							<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
						</div>
					</div>	
				</div>
			</div>
		</article>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<div class="flexslider">
					<ul class="slides">
						<?php
							$post_content = get_the_content();
							preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
							$array_id = explode(",", $ids[1]);
							
							foreach($array_id as $img_id){ ?>
								<li><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a></li>
							<?php } ?>
					</ul>
				</div>
			</div>
			<div class="post_text">
				<div class="post_inner">
					<h2><span class="date"><?php the_time('d M'); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<span class="post_infos">
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
					<?php the_excerpt(); ?>
					<div class="post_icons_holder">
						<?php echo do_shortcode('[social_share]'); ?>
						<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <?php comments_number( '0', '1', '%'); ?></a><?php } ?>
						<span class="post_social">
							<?php if( $qode_like == "on" ) { ?>
								<span class="blog_like">
									 <?php if(function_exists('qode_like')) { qode_like(); } ?>
								</span>
							<?php } ?>
						</span>	
					</div>
					<span class="qbutton_holder"><a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('READ MORE','qode'); ?></a></span>
				</div>
			</div>
		</article>
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_image">
					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('full'); ?>
						</a>
					<?php } else  { ?>
						<a href="<?php the_permalink(); ?>" target="_self">
							<i class="icon-quote-right"></i>
						</a>
					<?php } ?>
				</div>
				<div class="post_text">
					<div class="post_inner">
						<div class="post_text_holder">
							<i class="qoute_mark icon-quote-right pull-left"></i>
							<div class="post_description">
								<div class="post_icons_holder">
									<?php echo do_shortcode('[social_share]'); ?>
									<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <?php comments_number( '0', '1', '%'); ?></a><?php } ?>
									<span class="post_social">
										<?php if( $qode_like == "on" ) { ?>
											<span class="blog_like">
												 <?php if(function_exists('qode_like')) { qode_like(); } ?>
											</span>
										<?php } ?>
									</span>	
								</div>
								<span class="post_infos">
									<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span> 
									<?php _e(' | ','qode'); ?> <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>
									<?php _e(' | ','qode'); ?><?php the_author_meta('display_name'); ?>
								</span>
							</div>
							<div class="post_title">
								<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
								<span class="quote_author">&mdash; <?php the_title(); ?></span>
							</div>
						</div>	
					</div>
				</div>
			</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
				</div>
			<?php } ?>
			<div class="post_text">
				<div class="post_inner">
					<h2><span class="date"><?php the_time('d M'); ?></span> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<span class="post_infos">
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
					<?php the_excerpt(); ?>
					<div class="post_icons_holder">
						<?php echo do_shortcode('[social_share]'); ?>
						<?php if($blog_hide_comments != "yes"){ ?><a  class="post_comments" href="<?php comments_link(); ?>"><i class="icon-large icon-comments"></i> <span><?php comments_number( '0', '1', '%'); ?></a></span><?php } ?>
						<span class="post_social">
							<?php if( $qode_like == "on" ) { ?>
								<span class="blog_like">
									 <?php if(function_exists('qode_like')) { qode_like(); } ?>
								</span>
							<?php } ?>
						</span>	
					</div>
					<span class="qbutton_holder"><a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('READ MORE','qode'); ?></a></span>
				</div>
			</div>
		</article>
<?php
}
?>		
