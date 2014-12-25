<?php 
global $qode_options_river;
$page_id = $wp_query->get_queried_object_id();
 ?>
<?php 
$content_bottom_area = "yes";
if(get_post_meta($page_id, "qode_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "qode_enable_content_bottom_area", true);
} else{
	if (isset($qode_options_river['enable_content_bottom_area'])) { 
		$content_bottom_area = $qode_options_river['enable_content_bottom_area'];
	}
}
$content_bottom_area_sidebar = "";
if(get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
	$content_bottom_area_sidebar = get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true);
} else {
	if(isset($qode_options_river['content_bottom_sidebar_custom_display'])) {
		$content_bottom_area_sidebar = $qode_options_river['content_bottom_sidebar_custom_display'];
	}
}
$content_bottom_area_in_grid = true;
if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
	if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) == "yes") {
		$content_bottom_area_in_grid = true;
	} else {
		$content_bottom_area_in_grid = false;
	} 
}
else {
	if(isset($qode_options_river['content_bottom_in_grid'])){if ($qode_options_river['content_bottom_in_grid'] == "no") $content_bottom_area_in_grid = false;}
}
$content_bottom_background_color = '';
if(get_post_meta($page_id, "qode_content_bottom_background_color", true) != ""){
	$content_bottom_background_color = get_post_meta($page_id, "qode_content_bottom_background_color", true);
}
?>
	<?php if($content_bottom_area == "yes") { ?>
	<?php if($content_bottom_area_in_grid){ ?>
		<div class="container">
			<div class="container_inner clearfix">
	<?php } ?>
		<div class="content_bottom" <?php if($content_bottom_background_color != ''){ echo 'style="background-color:'.$content_bottom_background_color.';"'; } ?>>
			<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
		</div>
		<?php if($content_bottom_area_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	<?php } ?>
	</div>
</div>
	<footer>
		<?php
		$display_footer_top = true;
		if (isset($qode_options_river['show_footer_top'])) {
			if ($qode_options_river['show_footer_top'] == "no") $display_footer_top = false;
		}
		if($display_footer_top) { ?>
		<div class="footer_top_holder">
			<div class="footer_top">
				<div class="container">
					<div class="container_inner">
						<div class="four_columns clearfix">
							<div class="column1">
								<div class="column_inner">
									<?php dynamic_sidebar( 'footer_column_1' ); ?>
								</div>
							</div>
							<div class="column2">
								<div class="column_inner">
									<?php dynamic_sidebar( 'footer_column_2' ); ?>
								</div>
							</div>
							<div class="column3">
								<div class="column_inner">
									<?php dynamic_sidebar( 'footer_column_3' ); ?>
								</div>
							</div>
							<div class="column4">
								<div class="column_inner">
									<?php dynamic_sidebar( 'footer_column_4' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php
		$display_footer_text = false;
		if (isset($qode_options_river['footer_text'])) {
			if ($qode_options_river['footer_text'] == "yes") $display_footer_text = true;
		}
		if($display_footer_text): ?>
		<div class="footer_bottom_holder">
			<div class="footer_bottom">
				<?php dynamic_sidebar( 'footer_text' ); ?>
			</div>
		</div>
		<?php endif; ?>
	</footer>
</div>
</div>
	<?php
		global $qode_toolbar;
		if(isset($qode_toolbar)) include("toolbar.php")
	?>
	<?php wp_footer(); ?>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9000641; 
var sc_invisible=1; 
var sc_security="aa3b2a98"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="hit counter" href="http://statcounter.com/" target="_blank" class="external" rel="nofollow"><img
class="statcounter"
src="http://c.statcounter.com/9000641/0/aa3b2a98/1/"
alt="hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide --><!-- CHANGE TICKET BUTTON TEXT -->	
<script type="text/javascript">		
	$(".tn_results_tickets_text a").html('<i class="icon-ticket"></i> Tickets');
	$( ".tn_results_tickets_text a" ).addClass( "tkt-btn" );	
	$( ".tn_results_tickets_text" ).click(function() {
		var lbl= $(document).attr('title');
		ga('Ticket', 'Event', 'LINK', 'click', lbl);
	});
</script></body>
</html>