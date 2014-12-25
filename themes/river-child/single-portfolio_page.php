<?php
if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_river['responsive_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_river['fixed_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){
 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);
}else{
	$title_image = $qode_options_river['title_image'];
}

$portfolio_qode_like = "on";
if (isset($qode_options_river['portfolio_qode_like'])) {
	$portfolio_qode_like = $qode_options_river['portfolio_qode_like'];
}

$lightbox_single_project = "no";
if (isset($qode_options_river['lightbox_single_project'])) 
	$lightbox_single_project = $qode_options_river['lightbox_single_project'];


$porftolio_template = 1;
if(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 1){
		$porftolio_template = 1;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 2){
		$porftolio_template = 2;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 3){
		$porftolio_template = 3;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 4){
		$porftolio_template = 4;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 5){
		$porftolio_template = 5;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 6){
		$porftolio_template = 6;
	}
}elseif(isset($qode_options_river['portfolio_style'])){
	if($qode_options_river['portfolio_style'] == 1){
		$porftolio_template = 1;
	}elseif($qode_options_river['portfolio_style'] == 2){
		$porftolio_template = 2;
	}elseif($qode_options_river['portfolio_style'] == 3){
		$porftolio_template = 3;
	}elseif($qode_options_river['portfolio_style'] == 4){
		$porftolio_template = 4;
	}elseif($qode_options_river['portfolio_style'] == 5){
		$porftolio_template = 5;
	}elseif($qode_options_river['portfolio_style'] == 6){
		$porftolio_template = 6;
	}
}
	
$porftolio_single_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);
	
$columns_number = "v4";
if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 2){
		$columns_number = "v2";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 3){
		$columns_number = "v3";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 4){
		$columns_number = "v4";
	}
}else{
	if(isset($qode_options_river['portfolio_columns_number'])){
		if($qode_options_river['portfolio_columns_number'] == 2){
			$columns_number = "v2";
		} else if($qode_options_river['portfolio_columns_number'] == 3) {
			$columns_number = "v3";
		} else if($qode_options_river['portfolio_columns_number'] == 4) {
			$columns_number = "v4";
		}
	}
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_river['title_height'];
}

$title_background_color = '';
if(get_post_meta(get_the_ID(), "qode_page-title-background-color", true) != ""){
 $title_background_color = get_post_meta(get_the_ID(), "qode_page-title-background-color", true);
}else{
	$title_background_color = $qode_options_river['title_background_color'];
}

$show_title_image = true;
if(get_post_meta(get_the_ID(), "qode_show-page-title-image", true)) {
	$show_title_image = false;
}

$qode_page_title_style = "1";
if(get_post_meta(get_the_ID(), "qode_page_title_style", true) != ""){
	$qode_page_title_style = get_post_meta(get_the_ID(), "qode_page_title_style", true);
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
$id = get_the_ID();
?>

<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>
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
					<div class="portfolio_single">
						<?php switch ($porftolio_template) {
						case 1: ?>
						<div class="two_columns_50_50 clearfix portfolio_container">
							<!-- Share This Buttons -->
							<span class="text-left"><?php echo do_shortcode('[sharethis]'); ?></span>&nbsp;
							<div class="column1">
								<div class="column_inner">
									
									<div class="portfolio_detail portfolio_single_follow clearfix">
									<div class="portfolio_images">
									<?php
										$featured_image = get_the_post_thumbnail(get_the_ID(), medium);
										echo $featured_image;
									$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
									if ($portfolio_images){
										usort($portfolio_images, "comparePortfolioImages");
										foreach($portfolio_images as $portfolio_image){	
										?>

											<?php if($portfolio_image['portfolioimg'] != ""){ ?>

												<?php if($lightbox_single_project == "yes"){ ?>

												<?php 
													global $wpdb;
													$image_src = $portfolio_image['portfolioimg'];
													$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
													$id = $wpdb->get_var($query);
													$title = get_the_title($id);
												?>
													<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
														<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
													</a>
												<?php } else { ?>
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
												<?php } ?>

											<?php }else{ ?>
												
												<?php
												$portfoliovideotype = "";
												if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
												switch ($portfoliovideotype){
													case "youtube": ?>
														<?php if($lightbox_single_project == "yes"){ ?>
															<?php
																$vidID = $portfolio_image['portfoliovideoid'];  
																	$url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
																	$doc = new DOMDocument;
																	$doc->load($url);
																	$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
															?>
															<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
																<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
															</a>
														<?php } else { ?>	
															<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
														<?php } ?>
													<?php	break;
													case "vimeo": ?>
														<?php if($lightbox_single_project == "yes"){ ?>
															<?php
																$vidID = $portfolio_image['portfoliovideoid'];
																	$xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
																	$thumbnail = $xml[0]['thumbnail_large'];  
																	$title = $xml[0]['title'];
															?>
															<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
																<img width="100%" src="<?php echo $thumbnail; ?>"></img>
															</a>
														<?php } else { ?>	
															<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
														<?php } ?>

												<?php break;	
												} ?>
												
											<?php } ?>
											
										<?php						
										}
									}
									?>
									</div>
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
											<?php endif; ?>
											<p>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</p>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
										<div class="info">
											<h6><?php _e('Date','qode'); ?></h6>
											<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
										</div>
									<?php endif; ?>
									<div class="info">
										<h6><?php _e('CATEGORY ','qode'); ?></h6>
									 <span class="category">
									 <?php
										$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
										$counter = 0;
										$all = count($terms);
										foreach($terms as $term) {
											$counter++;
											if($counter < $all){ $after = ', ';}
											else{ $after = ''; }
											echo $term->name.$after;
										}
										?>
										</span>
									 </div>
										<h6><?php echo _e('ABOUT','qode'); ?></h6>
										<?php the_content(); ?>
										<?php if($portfolio_qode_like == "on") { ?>
											<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
										<?php } ?>
										<?php //echo do_shortcode('[sharethis]'); ?>
										
										<a  style="margin-top:20px;" class="qbutton  tiny normal" target="_self" title="<?php the_title(); ?> Tickets" href="http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=<?php the_title(); ?>">MORE TICKETS</a>
										
									</div>
									
								</div>
							</div>
							<div class="column2">
								<div class="column_inner">
									
									&nbsp;
									<h3 align="center"><?php the_title(); ?> Tickets</h3>&nbsp;&nbsp;
									
								<div class="table-responsive">				
									<script type="text/javascript">// <![CDATA[
									function TN_SetWidgetOptions() { TN_Widget.newWindow = false; TN_Widget.trackingParams = ''; TN_Widget.custLink = false; TN_Widget.tixUrl = 'http://tickets.tickethub.co/ResultsTicket.aspx'; }
									// ]]></script>
									<script type="text/javascript" src="http://site_01504_011.ticketsoftware.net/widget2_c.aspx?kwds=<?php the_title(); ?>&amp;style=0&amp;mxrslts=50">// <![CDATA[
									<span id="mce_marker" data-mce-type="bookmark"></span><span id="__caret">_</span>
									// ]]></script></div><a style="margin-top:20px;" class="qbutton  medium normal" title="<?php the_title(); ?> Tickets" target="_self" href="http://tickets.tickethub.co/ResultsGeneral.aspx?stype=0&kwds=<?php the_title(); ?>">MORE TICKETS</a>
								</div>
							</div>
						</div>
						
						<div class="portfolio_navigation">
							<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
							<?php } ?>
							<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
							
						</div>
						
						<?php	break;
						case 2: ?>
						<div class="two_columns_33_66 clearfix portfolio_container">
							<div class="column1">
								<div class="column_inner">
									<div class="flexslider">
										<ul class="slides">
											<?php
											$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
											if ($portfolio_images){
												usort($portfolio_images, "comparePortfolioImages");
												foreach($portfolio_images as $portfolio_image){	
												?>

													<?php if($portfolio_image['portfolioimg'] != ""){ ?>
														<li class="slide">
															<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
														</li>	
													<?php }else{ ?>
														
														<?php
														$portfoliovideotype = "";
														if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
														switch ($portfoliovideotype){
															case "youtube": ?>
																<li class="slide">
																	<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
																</li>	
															<?php	break;
															case "vimeo": ?>
																<li class="slide">
																	<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
																</li>

														<?php break;	
														} ?>
														
													<?php } ?>

												<?php						
												}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<div class="column2">
								<div class="column_inner">
									<div class="portfolio_detail">
										<?php
										$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
										if ($portfolios){
											usort($portfolios, "comparePortfolioOptions");
											foreach($portfolios as $portfolio){	
											
											?>
												<div class="info">
												<?php if($portfolio['optionLabel'] != ""): ?>
												<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
												<?php endif; ?>
												<p>
													<?php if($portfolio['optionUrl'] != ""): ?>
														<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
														</a>
													<?php else:?>
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													<?php endif; ?>
												</p>
												</div>
											<?php						
											}
										}
										?>
										<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
										<div class="info">
											<h6><?php _e('Date','qode'); ?></h6>
											<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
										</div>
										<?php endif; ?>
										<div class="info">
											<h6><?php _e('CATEGORY ','qode'); ?></h6>
										 <span class="category">
										 <?php
											$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
											$counter = 0;
											$all = count($terms);
											foreach($terms as $term) {
												$counter++;
												if($counter < $all){ $after = ', ';}
												else{ $after = ''; }
												echo $term->name.$after;
											}
											?>
											</span>
										 </div>
										<h6><?php echo _e('ABOUT','qode'); ?></h6>
										<?php the_content(); ?>
										<?php if($portfolio_qode_like == "on") { ?>
											<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
										<?php } ?>
										<?php echo do_shortcode('[social_share]'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="portfolio_navigation">
							<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
							<?php } ?>
							<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
						</div>
						
						<?php	break;
						case 3: ?>		
						<div class="flexslider">
							<ul class="slides">
								<?php
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									foreach($portfolio_images as $portfolio_image){
									usort($portfolio_images, "comparePortfolioImages");
									?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>
											<li class="slide">
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
											</li>	
										<?php }else{ ?>
											
											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<li class="slide">
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
													</li>	
												<?php	break;
												case "vimeo": ?>
													<li class="slide">
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													</li>
											<?php break;	
											} ?>
											
										<?php } ?>

									<?php						
									}
								}
								?>
							</ul>
						</div>
						<div class="two_columns_75_25 clearfix portfolio_container">
							<div class="column1">
								<div class="column_inner">
									<div class="portfolio_single_text_holder">
										<h6><?php echo _e('ABOUT','qode'); ?></h6>
										<?php the_content(); ?>
										<?php if($portfolio_qode_like == "on") { ?>
											<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
										<?php } ?>
										<?php echo do_shortcode('[social_share]'); ?>
									</div>
								</div>
							</div>
							<div class="column2">
								<div class="column_inner">
									<div class="portfolio_detail">
										<?php
										$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
										if ($portfolios){
											usort($portfolios, "comparePortfolioOptions");
											foreach($portfolios as $portfolio){	
											?>
												<div class="info">
												<?php if($portfolio['optionLabel'] != ""): ?>
												<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
												<?php endif; ?>
												<p>
													<?php if($portfolio['optionUrl'] != ""): ?>
														<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
														</a>
													<?php else:?>
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													<?php endif; ?>
												</p>
												</div>
											<?php						
											}
										}
										?>
										<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
										<div class="info">
											<h6><?php _e('Date','qode'); ?></h6>
											<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
										</div>
										<?php endif; ?>
										<div class="info">
											<h6><?php _e('CATEGORY ','qode'); ?></h6>
										 <span class="category">
										 <?php
											$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
											$counter = 0;
											$all = count($terms);
											foreach($terms as $term) {
												$counter++;
												if($counter < $all){ $after = ', ';}
												else{ $after = ''; }
												echo $term->name.$after;
											}
											?>
											</span>
										 </div>
									</div>
								</div>
							</div>
						</div>
						<div class="portfolio_navigation">
							<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
							<?php } ?>
							<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
						</div>
						
						<?php	break;
						case 4: ?>		
							<?php the_content(); ?>
							<div class="info">
								<p><?php _e('CATEGORY ','qode'); ?>
							 <span class="category">
							 <?php
								$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
								$counter = 0;
								$all = count($terms);
								foreach($terms as $term) {
									$counter++;
									if($counter < $all){ $after = ', ';}
									else{ $after = ''; }
									echo $term->name.$after;
								}
								?>
								</span>
								</p>
								<?php if($portfolio_qode_like == "on") { ?>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
								<?php echo do_shortcode('[social_share]'); ?>
							 </div>
							<div class="portfolio_navigation">
								<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
								<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
									<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
								<?php } ?>
								<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
							</div>
						<?php	break;
						case 5: ?>
							<div class="portfolio_images">
								
								<?php
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){	
									?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>

											<?php if($lightbox_single_project == "yes"){ ?>

											<?php 
												global $wpdb;
												$image_src = $portfolio_image['portfolioimg'];
												$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
												$id = $wpdb->get_var($query);
												$title = get_the_title($id);
											?>
												<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
												</a>
											<?php } else { ?>
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />	
											<?php } ?>

										<?php }else{ ?>
											
											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];  
																$url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
																$doc = new DOMDocument;
																$doc->load($url);
																$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
														</a>
													<?php } else { ?>	
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
													<?php } ?>
												<?php	break;
												case "vimeo": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];
																$xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
																$thumbnail = $xml[0]['thumbnail_large'];  
																$title = $xml[0]['title'];
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="<?php echo $thumbnail; ?>"></img>
														</a>
													<?php } else { ?>	
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													<?php } ?>

											<?php break;	
											} ?>
											
										<?php } ?>
										
									<?php						
									}
								}
								?>
								</div>
								<div class="two_columns_75_25 clearfix portfolio_container">
									<div class="column1">
										<div class="column_inner">
											<div class="portfolio_single_text_holder">
												<h6><?php echo _e('ABOUT','qode'); ?></h6>
												<?php the_content(); ?>
												<?php if($portfolio_qode_like == "on") { ?>
													<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
												<?php } ?>
												<?php echo do_shortcode('[social_share]'); ?>
											</div>
										</div>
									</div>
									<div class="column2">
										<div class="column_inner">
											<div class="portfolio_detail portfolio_single_follow">
												<?php
												$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
												if ($portfolios){
													usort($portfolios, "comparePortfolioOptions");
													foreach($portfolios as $portfolio){	
													?>
														<div class="info">
														<?php if($portfolio['optionLabel'] != ""): ?>
														<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
														<?php endif; ?>
														<p>
															<?php if($portfolio['optionUrl'] != ""): ?>
																<a href="<?php echo $portfolio['optionUrl']; ?>">
																<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
																</a>
															<?php else:?>
																<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
															<?php endif; ?>
														</p>
														</div>
													<?php						
													}
												}
												?>
												<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
												<div class="info">
													<h6><?php _e('Date','qode'); ?></h6>
													<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
												</div>
												<?php endif; ?>
												<div class="info">
													<h6><?php _e('CATEGORY ','qode'); ?></h6>
												 <span class="category">
												 <?php
													$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
													$counter = 0;
													$all = count($terms);
													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
												 </div>
											</div>
										</div>
									</div>
								</div>
								<div class="portfolio_navigation">
									<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
									<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
										<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
									<?php } ?>
									<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
								</div>
						<?php	break;
						case 6: ?>
							<div class="portfolio_gallery">
								<?php
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){	
									?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>
											<?php 
												global $wpdb;
												$image_src = $portfolio_image['portfolioimg'];
												$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
												$id = $wpdb->get_var($query);
												$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
											?>	
											<?php if($lightbox_single_project == "yes"){ ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
													<span class="gallery_text_holder"><span class="gallery_text_inner"><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
												</a>
											<?php } else { ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
													<span class="gallery_text_holder"><span class="gallery_text_inner"><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
												</a>
											<?php } ?>

										<?php }else{ ?>
											
											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<span class="gallery_text_holder"><span class="gallery_text_inner"><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
															<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg" />
														</a>
													<?php } else { ?>
														<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
															<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
														</a>
													<?php } ?>
												<?php	break;
												case "vimeo": ?>
													<?php if($lightbox_single_project == "yes"){ 
														$videoid = $portfolio_image['portfoliovideoid'];
														$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$videoid.".xml");
														$xml = $xml->video;
														$xml_pic = $xml->thumbnail_large; ?>
														<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<span class="gallery_text_holder"><span class="gallery_text_inner"><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
															<img width="100%" src="<?php echo $xml_pic;  ?>" />
														</a>	
													<?php } else { ?>
														<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="">
															<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
														</a>
													<?php } ?>

											<?php break;	
											} ?>
											
										<?php } ?>
										
									<?php						
									}
								}
								?>
							</div>
							<div class="two_columns_75_25 clearfix portfolio_container">
								<div class="column1">
									<div class="column_inner">
										<div class="portfolio_single_text_holder">
											<h6><?php echo _e('ABOUT','qode'); ?></h6>
											<?php the_content(); ?>
											<?php if($portfolio_qode_like == "on") { ?>
												<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
											<?php } ?>
											<?php echo do_shortcode('[social_share]'); ?>
										</div>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<div class="portfolio_detail">
											<?php
											$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
											if ($portfolios){
												usort($portfolios, "comparePortfolioOptions");
												foreach($portfolios as $portfolio){	
												?>
													<div class="info">
													<?php if($portfolio['optionLabel'] != ""): ?>
													<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
													<?php endif; ?>
													<p>
														<?php if($portfolio['optionUrl'] != ""): ?>
															<a href="<?php echo $portfolio['optionUrl']; ?>">
															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
															</a>
														<?php else:?>
															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
														<?php endif; ?>
													</p>
													</div>
												<?php						
												}
											}
											?>
											<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
											<div class="info">
												<h6><?php _e('Date','qode'); ?></h6>
												<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
											</div>
											<?php endif; ?>
											<div class="info">
												<h6><?php _e('CATEGORY ','qode'); ?></h6>
											 <span class="category">
											 <?php
												$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
												$counter = 0;
												$all = count($terms);
												foreach($terms as $term) {
													$counter++;
													if($counter < $all){ $after = ', ';}
													else{ $after = ''; }
													echo $term->name.$after;
												}
												?>
												</span>
											 </div>
										</div>
									</div>
								</div>
							</div>
							<div class="portfolio_navigation">
								<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></div>
								<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
									<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"><i class="icon-th"></i></a></div>
								<?php } ?>
								<div class="portfolio_next"><?php next_post_link('%link','<i class="icon-chevron-right"></i>'); ?></div>
							</div>
						<?php	break;
						}
						?>
				<?php endwhile; ?>
			<?php endif; ?>	
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>	