$j(window).load(function(){
	setTimeout(function(){
		$j("#panel").animate({marginLeft: "0px"});
		$j("a.open").addClass('opened');
		$j("#panel").addClass('opened-panel');
	},1000);
});

$j(document).ready(function() {
	
	$j("#panel a.open").click(function(e){
		e.preventDefault();
		var margin_left = $j("#panel").css("margin-left");
		if (margin_left == "-185px"){
			$j("#panel").animate({marginLeft: "0px"});
			$j("#panel").addClass('opened-panel');
			$j(this).addClass('opened');
		}
		else{
			$j("#panel").animate({marginLeft: "-185px"});
			$j(this).removeClass('opened');
			$j("#panel").removeClass('opened-panel');
		}
		return false;
	});
	
	
        $j(".accordion_toolbar").accordion({
            animate: "swing",
            collapsible: true,
			active: false,
            icons: "",
            heightStyle: "content"
        });

	
	$j('ul#tootlbar_header_top li').click(function(){
		if($j(this).attr("data-value") != ""){
			
    	$j.post(root+'updatesession.php', {header_top : $j(this).attr("data-value")}, function(data){
					location.reload();
			});
		}
	});
	
	$j('ul#tootlbar_smooth_scroll li').click(function(){
		if($j(this).attr("data-value") != ""){
    	$j.post(root+'updatesession.php', {smooth : $j(this).attr("data-value")}, function(data){
					location.reload();
			});
		}
	});
	
	$j('ul#tootlbar_pattern li').click(function(){
		jQuery('#tootlbar_pattern_css').remove();
		
		if($j(this).attr("data-value") != "no"){
			//$j('#tootlbar_boxed').getSetSSValue('boxed');
			//$j('#tootlbar_background').getSetSSValue('no');
			$j('body').addClass('boxed');
			newSkin ="body.boxed .wrapper { \
									background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+$j(this).attr("data-value")+".png'); \
									background-position: 0px 0px; \
									background-repeat: repeat; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_pattern_css" type="text/css">'+newSkin+'</style>'); 
			
		}else{
			newSkin ="body { \
									background-image: none; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_pattern_css" type="text/css">'+newSkin+'</style>'); 
		}
	});
	
	$j('ul#tootlbar_background li').click(function(){
	
	jQuery('#tootlbar_background_css').remove();
		if($j(this).attr("data-value") != "no"){
			//$j('#tootlbar_boxed').getSetSSValue('boxed');
			//$j('#tootlbar_pattern').getSetSSValue('no');
			$j('body').addClass('boxed');
			newSkin ="body.boxed .wrapper { \
									background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+$j(this).attr("data-value")+".jpg'); \
									background-position: 0px 0px; \
									background-repeat: repeat; \
									background-attachment: fixed; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_background_css" type="text/css">'+newSkin+'</style>'); 
			
		}else{
			newSkin ="body { \
									background-image: none; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_background_css" type="text/css">'+newSkin+'</style>'); 
		}
	});
	
	$j('ul#tootlbar_boxed li').click(function(){
	
		$j('body').removeClass('boxed');
		$j('body').addClass($j(this).attr("data-value"));
		
		if($j(this).attr("data-value") != "boxed"){
			$j('#tootlbar_pattern').getSetSSValue('no');
			$j('#tootlbar_background').getSetSSValue('no');
		}
	});	
	
	$j('#tootlbar_colors .color').each(function(){
		$j(this).on('click',function(){
			$j('#tootlbar_colors .color').removeClass('active');
			$j(this).addClass('active');
			var color = $j(this).data('color');
			
			if($j(this).hasClass('color1')){
				var logo_image = "logo_red";
				var social_share = "social_share_red";
				var circle_list = "list_circle_red";
				var footer_logo_image = "footer_logo_red";
			}else if($j(this).hasClass('color2')){
				var logo_image = "logo_purple";
				var social_share = "social_share_purple";
				var circle_list = "list_circle_purple";
				var footer_logo_image = "footer_logo_purple";
			}else if($j(this).hasClass('color3')){
				var logo_image = "logo_yellow";
				var social_share = "social_share_yellow";
				var circle_list = "list_circle_yellow";
				var footer_logo_image = "footer_logo_yellow";
			}else if($j(this).hasClass('color4')){
				var logo_image = "logo_green";
				var social_share = "social_share_green";
				var circle_list = "list_circle_green";
				var footer_logo_image = "footer_logo_green";
			}else if($j(this).hasClass('color5')){
				var logo_image = "logo_blue";
				var social_share = "social_share_blue";
				var circle_list = "list_circle_blue";
				var footer_logo_image = "footer_logo_blue";
			}else if($j(this).hasClass('color6')){
				var logo_image = "logo_gray";
				var social_share = "social_share_gray";
				var circle_list = "list_circle_gray";
				var footer_logo_image = "footer_logo_gray";
			}else{
				var logo_image = "logo_red";
				var social_share = "social_share_red";
				var circle_list = "list_circle_red";
				var footer_logo_image = "footer_logo_red";
			}
			
			if ($j("#toolbar_colors_css").length > 0){
				$j("#toolbar_colors_css").remove();
			}
			
			$j('.logo img').attr('src', 'http://demo.qodeinteractive.com/river/demo_images/'+logo_image+'.png');
			$j('footer .footer_logo').attr('src', 'http://demo.qodeinteractive.com/river/demo_images/'+footer_logo_image+'.png');
			
			newSkin ="table th, \
					table tr:nth-child(odd) td, \
					.progress_bar .progress_content, \
					.progress_bars_vertical .progress_content_outer .progress_content, \
					.box_holder_icon_inner.square .icon-stack, \
					.qbutton, \
					.icon_list i, \
					.load_more a, \
					#submit_comment, \
					.drop_down .wide .second ul li .qbutton, \
					.drop_down .wide .second ul li ul li .qbutton, \
					.call_to_action.elegant .cta_button, \
					.portfolio_gallery a .gallery_text_holder, \
					.projects_holder article span.text_holder, \
					.filter_holder ul li.active span, \
					.tabs .tabs-nav li.active a, \
					.highlight, \
					.testimonials .testimonial_nav li.active a, \
					.gallery_holder ul li .gallery_hover, \
					.active_best_price, \
					.progress_bars_icons_inner.square .bar.active .bar_noactive, \
					.progress_bars_icons_inner.square .bar.active .bar_active, \
					.list.number.circle_number ul>li:before, \
					.social_share_dropdown ul li.share_title, \
					.blog_holder article.format-link .post_text .post_text_holder, \
					.blog_holder article.format-quote .post_text .post_text_holder, \
					.single_links_pages a:hover span, \
					.single_tags a, \
					.pagination ul li span, \
					.widget.widget_search form input[type='submit'], \
					.widget .tagcloud a, \
					.mejs-controls .mejs-time-rail .mejs-time-current, \
					.mejs-controls .mejs-time-rail .mejs-time-handle, \
					.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, \
					.pie_graf_legend ul li .color_holder, \
					.line_graf_legend ul li .color_holder, \
					.circle_item .circle, \
					nav.main_menu > ul > li.active > a > span, \
					.projects_holder.circle .mix .image .circle_hover{ \
					background-color: "+color+"; \
					} \
					.icon_with_title.boxed .icon_holder .icon-stack:hover, \
					footer .social_icon_holder .icon-stack:hover, \
					.side_menu .social_icon_holder .icon-stack:hover, \
					.steps_holder .circle_small, \
					.toolbar_change .dropcap, \
					.toolbar_change .social_icon_holder .icon-stack, \
					.toolbar_change .message, \
					.toolbar_change_about > section.section, \
					.slider .ls-layer > div{ \
						background-color: "+color+" !important; \
					} \
					.portfolio_gallery a .gallery_text_holder, \
					.projects_holder article span.text_holder, \
					.gallery_holder ul li .gallery_hover{ \
						background-color: rgba("+hexToRgb(color).r+","+hexToRgb(color).g+","+hexToRgb(color).b+", 0.9); \
					} \
					a:hover, \
					p a:hover, \
					.drop_down .wide .second ul li a, \
					.title .breadcrumb .current, \
					.title .breadcrumb a:hover, \
					.box_image_holder .box_icon .icon-stack i.icon-stack-base, \
					.counter_holder span.counter, \
					.box_holder_icon i, \
					.qbutton.no_fill, \
					.qbutton.no_fill:hover, \
					.portfolio_like a.liked i, \
					.portfolio_like a:hover i, \
					.portfolio_single .portfolio_like a.liked i, \
					.portfolio_single .portfolio_like a:hover i, \
					.accordion_holder.accordion.with_icon .ui-accordion-header i, \
					.testimonial_text_inner .testimonial_name .author_desc, \
					blockquote i.pull-left, \
					.dropcap, \
					.message.with_icon > i, \
					.price_in_table .value, \
					.icon_with_title .icon_holder i, \
					.font_awsome_icon_square i, \
					.font_awsome_icon_stack i, \
					.font_awsome_icon i, \
					.progress_bars_icons_inner.normal .bar.active i, \
					.progress_bars_icons_inner .bar.active i.icon-circle, \
					.list.number ul>li:before, \
					.social_icon_holder .icon-stack i, \
					.blog_holder article .post_text  h2 .date, \
					.blog_holder article .post_infos a:hover, \
					.blog_holder article .post_infos .post_author:hover, \
					.blog_holder article .post_infos .post_comments:hover, \
					.blog_holder article  .post_icons_holder  a.post_comments:hover i, \
					.blog_holder article  .post_icons_holder  a.post_comments:hover, \
					.blog_like a:hover i, \
					.blog_like a.liked i, \
					.blog_like a:hover span, \
					.social_share_dropdown ul li:hover .share_text, \
					.social_share_dropdown ul li :hover i, \
					aside .widget li a:hover, \
					.footer_top .widget_recent_entries > ul > li > a:hover, \
					#back_to_top:hover, \
					.vc_text_separator.full div, \
					aside .widget #lang_sel ul ul a:hover, \
					aside .widget #lang_sel_click ul ul a:hover, \
					section.side_menu #lang_sel ul ul a:hover, \
					section.side_menu #lang_sel_click ul ul a:hover, \
					footer #lang_sel ul ul a:hover, \
					footer #lang_sel_click ul ul a:hover, \
					aside .widget #lang_sel_list li a:hover, \
					section.side_menu #lang_sel_list li a:hover, \
					footer #lang_sel_list li a:hover, \
					aside .widget #lang_sel_list.lang_sel_list_vertical a.lang_sel_sel, \
					aside .widget #lang_sel_list.lang_sel_list_horizontal a.lang_sel_sel{ \
						color: "+color+"; \
					} \
					.icon_with_title.circle .icon_holder .icon-stack:hover i.icon-circle, \
					.font_awsome_icon_stack:hover .icon-circle, \
					.wpb_text_column h6 span span, \
					.box_holder_icon .icon-stack i.icon-circle, \
					.toolbar_change .icon_list i, \
					.toolbar_change1 .social_icon_holder .icon-stack i, \
					.custom_font_holder span span{ \
						color: "+color+" !important; \
					} \
					.ajax_loader_html, \
					.box_image_with_border:hover, \
					.qbutton.no_fill, \
					.tabs .tabs-nav li.active a, \
					#respond textarea:focus, \
					#respond input[type='text']:focus, \
					.contact_form input[type='text']:focus, \
					.contact_form  textarea:focus, \
					.widget.widget_search form input[type='text']:focus, \
					.vc_text_separator.full div{ \
						border-color: "+color+"; \
					} \
					.toolbar_change1 .message{ \
						border-color: "+color+" !important; \
					} \
					.social_share_holder:hover .social_share_icon{\
						background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+social_share+".png');\
					}\
					@media only screen and (-webkit-min-device-pixel-ratio:1.5), only screen and (min--moz-device-pixel-ratio:1.5), only screen and (-o-min-device-pixel-ratio:150/100), only screen and (min-device-pixel-ratio:1.5), only screen and (min-resolution:160dpi) {\
						.social_share_holder:hover .social_share_icon{\
							background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+social_share+"@1_5x.png');\
						}\
					}\
					@media only screen and (-webkit-min-device-pixel-ratio:2.0), only screen and (min--moz-device-pixel-ratio:2.0), only screen and (-o-min-device-pixel-ratio:200/100), only screen and (min-device-pixel-ratio:2.0), only screen and (min-resolution:210dpi) {\
						.social_share_holder:hover .social_share_icon{\
							background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+social_share+"@2x.png');\
						}\
					}\
					.list.circle ul>li{\
						background-image: url('http://demo.qodeinteractive.com/river/demo_images/"+circle_list+".png');\
					}\
					";
				jQuery('body').append('<style id="toolbar_colors_css" type="text/css">'+newSkin+'</style>');
		});
	});
}); 

function hexToRgb(hex) {
    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

$j.fn.inlineStyle = function (prop) {
	 var styles = this.attr("style"),
		 value;
	 styles && styles.split(";").forEach(function (e) {
		 var style = e.split(":");
		 if ($j.trim(style[0]) === prop) {
			 value = style[1];           
		 }                    
	 });   
	 return value;
};