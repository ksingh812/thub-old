<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_river;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_river['disable_qode_seo'])) $disable_qode_seo = $qode_options_river['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
	<?php
	$responsiveness = "yes";
	if (isset($qode_options_river['responsiveness'])) $responsiveness = $qode_options_river['responsiveness'];
	if($responsiveness != "no"):
	?>
	<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no" />
	<?php 
	endif;
	?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	<?php if ($disable_qode_seo != "yes") { ?>
	<?php if($seo_description) { ?>
	
	<?php } else if($qode_options_river['meta_description']){ ?>
	
	<?php } ?>
	<?php if($seo_keywords) { ?>
	<meta name="keywords" content="<?php echo $seo_keywords; ?>">
	<?php } else if($qode_options_river['meta_keywords']){ ?>
	<meta name="keywords" content="<?php echo $qode_options_river['meta_keywords'] ?>">
	<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_river['favicon_image']; ?>">
	<!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
				 filter: none;
			}
		</style>
	<![endif]-->

	<?php wp_head(); ?>
	<link rel='stylesheet' href='http://www.tickethub.co/wp-content/themes/river/css/bootstrap-theme.css?ver=3.0.3' type='text/css' media='all' />
	<link rel='stylesheet' href='http://www.tickethub.co/wp-content/themes/river/css/bootstrap-theme.min.css?ver=3.0.3' type='text/css' media='all' /><link rel='stylesheet' href='http://www.tickethub.co/wp-content/themes/river/css/bootstrap.css?ver=3.0.3' type='text/css' media='all' />
<link rel='stylesheet' href='http://www.tickethub.co/wp-content/themes/river/css/bootstrap.min.css?ver=3.0.3' type='text/css' media='all' />
	<!--<script type='text/javascript' src='http://www.tickethub.co/wp-includes/js/bootstrap.js'></script>
	<script type='text/javascript' src='http://www.tickethub.co/wp-includes/js/bootstrap.min.js'></script> -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-28896235-1', 'tickethub.co');
	  ga('require', 'displayfeatures');
	  ga('send', 'pageview');
  </script>
	<script type="application/ld+json">
	{
	   "@context": "http://schema.org",
	   "@type": "WebSite",
	   "url": "http://www.tickethub.co/",
	   "potentialAction": {
		 "@type": "SearchAction",
		 "target": "http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds={search_term_string}",
		 "query-input": "required name=search_term_string"
	   }
	}
	</script>
</head>

<body <?php body_class(); ?>>
	
	
	<?php
		$loading_animation = true;
		if (isset($qode_options_river['loading_animation'])){ if($qode_options_river['loading_animation'] == "off") { $loading_animation = false; }};
	
		if (isset($qode_options_river['loading_image']) && $qode_options_river['loading_image'] != ""){ $loading_image = $qode_options_river['loading_image'];}else{ $loading_image =  ""; }
	?>
	<?php if($loading_animation){ ?>
		<div class="ajax_loader"><div class="ajax_loader_1"><?php if($loading_image != ""){ ?><div class="ajax_loader_2"><img src="<?php echo $loading_image; ?>" alt="" /></div><?php } else{ ?><div class="ajax_loader_html"></div><?php } ?></div></div>
	<?php } ?>
	<?php 
		$enable_side_area = "yes";
		if (isset($qode_options_river['enable_side_area'])){ if($qode_options_river['enable_side_area'] == "no") { $enable_side_area = "no"; }};
	?>
	<?php if($enable_side_area != "no") { ?>
		<section class="side_menu right">
			<div class="side_menu_title">
				<?php if(isset($qode_options_river['side_area_title']) && $qode_options_river['side_area_title'] != "") { echo '<h3>'.$qode_options_river['side_area_title'].'</h3>'; } ?>
			</div>
			<?php dynamic_sidebar('sidearea'); ?>
		</section>
	<?php } ?>
	<div class="wrapper">
	<div class="wrapper_inner">
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_river['google_analytics_code'])){
				if($qode_options_river['google_analytics_code'] != "") { 
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_river['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->
	
<?php
	$header_in_grid = true;
	if(isset($qode_options_river['header_in_grid'])){if ($qode_options_river['header_in_grid'] == "no") $header_in_grid = false;}
	
	$menu_in_center = false;
	if(isset($qode_options_river['menu_in_center'])){if ($qode_options_river['menu_in_center'] == "yes") $menu_in_center = true;}
	
	$centered_logo = false;
	if (isset($qode_options_river['center_logo_image'])){ if($qode_options_river['center_logo_image'] == "yes") { $centered_logo = true; }};
?>

<?php 
	$display_header_top = "yes";
	if(isset($qode_options_river['header_top_area'])){
		$display_header_top = $qode_options_river['header_top_area'];
	}
	if (!empty($_SESSION['qode_header_top'])){
		$display_header_top = $_SESSION['qode_header_top'];
	}
	
	$header_top_area_scroll = "no";
	if(isset($qode_options_river['header_top_area_scroll']))
		$header_top_area_scroll = $qode_options_river['header_top_area_scroll'];

	if (!empty($_SESSION['qode_header_top'])) {
		if ($_SESSION['qode_header_top'] == "no")
			$header_top_area_scroll = "no";
		if ($_SESSION['qode_header_top'] == "yes")
			$header_top_area_scroll = "yes";
	}

	
	
?>

<header class="<?php if($display_header_top == "yes"){ echo 'has_top'; } if($header_top_area_scroll == "yes"){ echo ' scroll_top'; }?> <?php if($centered_logo){ echo " centered_logo"; } ?>">
	<div class="header_inner clearfix">
	
	<?php if($display_header_top == "yes"){ ?>
		<div class="header_top clearfix">
			<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="left">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_left'); 
						?>
						</div>
					</div>
					<div class="right">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_right'); 
						?>
						</div>
					</div>
				<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="header_bottom clearfix">
		<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="header_inner_left">
						<div class="mobile_menu_button"><span><i class="icon-reorder"></i></span></div>
						<div class="logo_wrapper">
							<div class="logo">
									<a href="<?php echo home_url(); ?>/">
											<img src="<?php echo $qode_options_river['logo_image']; ?>" alt="Logo"/>
									</a>
							</div>
							
						</div>
						
					</div>
					<?php if($enable_side_area != "no" && !$centered_logo) { ?>
						<div class="header_inner_right">
							<div class="side_menu_button_wrapper right"><div class="side_menu_button"><a href="javascript:void(0)"><i class="icon-reorder"></i></a></div></div>
						</div>
					<?php } ?>
					<nav class="main_menu drop_down <?php if(!$menu_in_center){ echo 'right';} ?>">
					<?php
						
						wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																'container'  => '', 
																'container_class' => '', 
																'menu_class' => '', 
																'menu_id' => '',
																'fallback_cb' => 'top_navigation_fallback',
																'link_before' => '<span>',
																'link_after' => '</span>',
																'walker' => new qode_type1_walker_nav_menu()
					 ));
					?>
					</nav>
					<?php if($enable_side_area != "no" && $centered_logo) { ?>
						<div class="header_inner_right">
								<div class="side_menu_button_wrapper right"><div class="side_menu_button"><a href="javascript:void(0)"><i class="icon-reorder"></i></a></div></div>
						</div>
					<?php } ?>
					<nav class="mobile_menu">
						<?php			
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type2_walker_nav_menu()
						 ));
						?>
					</nav>
			<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	</div>
	</div>
</header>
	<div class="content">
		<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_river['page_transitions'] == "1" || $qode_options_river['page_transitions'] == "2" || $qode_options_river['page_transitions'] == "3" || $qode_options_river['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_river['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_river['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_river['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_river['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">