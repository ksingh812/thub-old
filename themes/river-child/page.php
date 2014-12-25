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
				<?php if(is_page(32787))
		{?>
		<div class="areabox">
				<table cellpadding="0" cellspacing="0" style="width:100%">
							<tbody>

							<tr>
							  <td width="20%" align="right" style="COLOR: #fff; font-size:16px;"><b>Search by city:&nbsp;</b></td>
							 <td align="left" style="text-align:left;">
								<select name="City" id="City" style="width: 50%;height: 30px;font-size: 16px;">
								  <option value="" selected="selected">--Select a city--</option>
									<option value="36">Akron, OH</option>
									<option value="33">Albuquerque, NM</option>
									<option value="5">Anaheim, CA</option>
									<option value="1">Anchorage, AK</option>
									<option value="44">Arlington, TX</option>
									<option value="11">Atlanta, GA</option>
									<option value="6">Aurora, CO</option>
									<option value="44">Austin, TX</option>
									<option value="5">Bakersfield, CA</option>
									<option value="21">Baltimore, MD</option>
									<option value="19">Baton Rouge, LA</option>
									<option value="2">Birmingham, AL</option>
									<option value="20">Boston, MA</option>
									<option value="35">Buffalo, NY</option>
									<option value="4">Chandler, AZ</option>
									<option value="28">Charlotte, NC</option>
									<option value="46">Chesapeake, VA</option>
									<option value="15">Chicago, IL</option>
									<option value="5">Chula Vista, CA</option>
									<option value="36">Cincinnati, OH</option>
									<option value="36">Cleveland, OH</option>
									<option value="6">Colorado Springs, CO</option>
									<option value="36">Columbus, OH</option>
									<option value="44">Corpus Christi, TX</option>
									<option value="44">Dallas, TX</option>
									<option value="6">Denver, CO</option>
									<option value="23">Detroit, MI</option>
									<option value="28">Durham, NC</option>
									<option value="44">El Paso, TX</option>
									<option value="16">Fort Wayne, IN</option>
									<option value="44">Fort Worth, TX</option>
									<option value="5">Fremont, CA</option>
									<option value="5">Fresno, CA</option>
									<option value="44">Garland, TX</option>
									<option value="4">Glendale, AZ</option>
									<option value="5">Glendale, CA</option>
									<option value="28">Greensboro, NC</option>
									<option value="7">Hartford, CT</option>
									<option value="34">Henderson, NV</option>
									<option value="10">Hialeah, FL</option>
									<option value="12">Honolulu, HI</option>
									<option value="44">Houston, TX</option>
									<option value="16">Indianapolis, IN</option>
									<option value="10">Jacksonville, FL</option>
									<option value="32">Jersey City, NJ</option>
									<option value="25">Kansas City, MO</option>
									<option value="44">Laredo, TX</option>
									<option value="34">Las Vegas, NV</option>
									<option value="18">Lexington, KY</option>
									<option value="30">Lincoln, NE</option>
									<option value="56">London, EN</option>
									<option value="5">Long Beach, CA</option>
									<option value="5">Los Angeles, CA</option>
									<option value="18">Louisville, KY</option>
									<option value="44">Lubbock, TX</option>
									<option value="49">Madison, WI</option>
									<option value="43">Memphis, TN</option>
									<option value="4">Mesa, AZ</option>
									<option value="10">Miami, FL</option>
									<option value="49">Milwaukee, WI</option>
									<option value="24">Minneapolis, MN</option>
									<option value="5">Modesto, CA</option>
									<option value="2">Montgomery, AL</option>
									<option value="54">Montreal, QC</option>
									<option value="43">Nashville, TN</option>
									<option value="19">New Orleans, LA</option>
									<option value="35">New York, NY</option>
									<option value="32">Newark, NJ</option>
									<option value="46">Norfolk, VA</option>
									<option value="5">Oakland, CA</option>
									<option value="37">Oklahoma City, OK</option>
									<option value="30">Omaha, NE</option>
									<option value="10">Orlando, FL</option>
									<option value="61">Paris, FR</option>
									<option value="39">Philadelphia, PA</option>
									<option value="4">Phoenix, AZ</option>
									<option value="39">Pittsburgh, PA</option>
									<option value="44">Plano, TX</option>
									<option value="38">Portland, OR</option>
									<option value="28">Raleigh, NC</option>
									<option value="5">Riverside, CA</option>
									<option value="35">Rochester, NY</option>
									<option value="5">Sacramento, CA</option>
									<option value="25">Saint Louis, MO</option>
									<option value="24">Saint Paul, MN</option>
									<option value="10">Saint Petersburg, FL</option>
									<option value="44">San Antonio, TX</option>
									<option value="5">San Diego, CA</option>
									<option value="5">San Francisco, CA</option>
									<option value="5">San Jose, CA</option>
									<option value="57">San Juan, PR</option>
									<option value="5">Santa Ana, CA</option>
									<option value="4">Scottsdale, AZ</option>
									<option value="48">Seattle, WA</option>
									<option value="19">Shreveport, LA</option>
									<option value="5">Stockton, CA</option>
									<option value="10">Tampa, FL</option>
									<option value="36">Toledo, OH</option>
									<option value="53">Toronto, ON</option>
									<option value="4">Tucson, AZ</option>
									<option value="37">Tulsa, OK</option>
									<option value="52">Vancouver, BC</option>
									<option value="46">Virginia Beach, VA</option>
									<option value="8">Washington, DC</option>
									<option value="17">Wichita, KS</option>


				</select> <input name="TNSearchButton" id="TNSearchButton" onclick="SubmitSearch()" value="Go!" type="button" style="height: 30px;border: 0px;width: 51px; vertical-align:middle;">
				</td>
				</tr>
				</tbody></table>

				<script language="javascript">

				function SubmitSearch()
				{
				var citySelect = document.getElementById('City');
				var number = citySelect.selectedIndex;
				if(citySelect.options[number].value == "")
					return;
				var newLocation="http://tickets.tickethub.co/ResultsCity.aspx?city=";
				newLocation += citySelect.options[number].text.split(",")[0]+"&stprvid="+citySelect.options[number].value+"&location="+citySelect.options[number].text;

				//newLocation+="&sdate="+document.getElementById("txtEventDateStart").value + "&edate="+document.getElementById("txtEventDateEnd").value;

				window.location=newLocation;
				}

				//-->
				</script>

				</div>
		<?php
		}
		else{?>
						
			<?php } ?>

			</div>
		</div>
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
								<div>TEST</div>
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