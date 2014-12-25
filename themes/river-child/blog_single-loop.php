<?php 
global $qode_options_river;
$blog_hide_comments = "";
if (isset($qode_options_river['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_river['blog_hide_comments'];
}
$blog_author_info="no";
if (isset($qode_options_river['blog_author_info'])) {
	$blog_author_info = $qode_options_river['blog_author_info'];
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
				<?php if(get_post_meta(get_the_ID(), "video_height", true) != "") { 
					$video_height = get_post_meta(get_the_ID(), "video_height", true);
				} else {
					$video_height = 540;
				} ?>
				<?php if($_video_type == "youtube") { ?>
					<iframe height="<?php echo $video_height; ?>" src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe height="<?php echo $video_height; ?>" src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } ?>
			</div>
			<div class="post_text">
				<div class="post_description">
					<span class="post_infos">
						<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
				</div>	
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<audio src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
					<?php _e("Your browser don't support audio player","qode"); ?>
				</audio>
			</div>
			<div class="post_text">
				<div class="post_description">
					<span class="post_infos">
						<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
				</div>	
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
	
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_text">
				<div class="post_text_holder">
					<i class="link_mark icon-link pull-left"></i>
					<div class="post_description">
						<span class="post_infos">
							<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
							<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
							<?php the_author_meta('display_name'); ?>
						</span>
					</div>
					<div class="post_title">
						<p><a href="<?php echo get_post_meta(get_the_ID(), "title_link", true); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
					</div>
				</div>
				
			</div>
		<?php the_content(); ?>
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
				<div class="post_description">
					<span class="post_infos">
						<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
				</div>	
				<h2><?php the_title(); ?></a></h2>
				<?php
					$content =  str_replace($ids[0], "", $post_content);
					echo do_shortcode($content);
				?>
			</div>
		
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_text">
					<div class="post_text_holder">
						<i class="qoute_mark icon-quote-right pull-left"></i>
						<div class="post_description">
							<span class="post_infos">
								<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
								<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
								<?php the_author_meta('display_name'); ?>
							</span>
						</div>
						<div class="post_title">
							<p><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></p>
							<span class="quote_author">&mdash; <?php the_title(); ?></span>
						</div>
					</div>
					
				</div>
			<?php the_content(); ?>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post_image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('small'); ?>
						</a>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="post_text">
				<div class="post_description">
					<span class="post_infos">
						<span class="date"><?php the_time('d'); ?></span> <span class="month"><?php the_time('F'); ?></span><?php _e(' | ','qode'); ?> 
						<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?><?php _e(' | ','qode'); ?> 
						<?php the_author_meta('display_name'); ?>
					</span>
				</div>	
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<p><?php 
				$rsr_title = get_post_meta( $post->ID, '_cd_rsr_title_content', true );
				if ( $rsr_title !='')
				{
				echo '<h3>' . $rsr_title . ' Tickets </h3>'; ?>
				<script type="text/javascript">// <![CDATA[
                                                                    function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://tickets.tickethub.co/ResultsTicket.aspx'; }
// ]]></script>
<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php echo $rsr_title; ?>&amp;style=0&amp;mxrslts=50">// <![CDATA[
<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
// ]]></script>
				</p>
				<?php } ?>
			</div>
		
<?php
}
?>
<?php if( has_tag()) { ?>
	<div class="single_tags">
		<h4><?php _e('TAGS ','qode') ?></h4>
		<?php the_tags('', '', ''); ?>
	</div>	
<?php } ?>				
<?php 
	$args_pages = array(
		'before'           => '<p class="single_links_pages">',
		'after'            => '</p>',
		'pagelink'         => '<span>%</span>'
	);

	wp_link_pages($args_pages); ?>
<?php if($blog_author_info == "yes") { ?>
	<div class="author_description">
		<div class="author_description_inner">
			<div class="image">
				<?php echo get_avatar(get_the_author_meta( 'ID' ), 80); ?>
			</div>
			<div class="author_text_holder">
				<h4 class="author_name"><?php _e('AUTHOR','qode') ?> - 
				<?php  
				if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
					echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name');
				} else {
					echo get_the_author_meta('display_name');
				}
				?>
				</h4>
				<?php if(get_the_author_meta('description') != "") { ?>
					<div class="author_text">
						<p><?php echo get_the_author_meta('description') ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
</article>
<div class="blog_social_and_comments">
	<?php if($blog_hide_comments != "yes"){ ?>
		<div class="comment_number_holder">
			<p><?php comments_number( __('No Comment','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></p>
		</div>
	<?php } ?>
	<div class="blog_single_social">
		<?php if( $qode_like == "on" ) { ?>
			<span class="blog_like">
				 <?php if(function_exists('qode_like')) { qode_like(); } ?>
			</span>
		<?php } ?>
		<?php echo do_shortcode('[social_share]'); ?>
	</div>
</div>