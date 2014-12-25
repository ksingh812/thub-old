<?php
// Removing shortcodes
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
$fa_icons = getFontAwesomeIconArray();
$icons = array();
$icons[""] = "";
foreach ($fa_icons as $key => $value) { 
			$icons[$key] = $key;
		}

$animations = array(
	"" => "",
	"Elements Shows From Left Side" => "element_from_left",
	"Elements Shows From Right Side" => "element_from_right",
	"Elements Shows From Top Side" => "element_from_top",
	"Elements Shows From Bottom Side" => "element_from_bottom",
	"Elements Shows From Fade" => "element_from_fade"
);
// Accordion
vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Style"),
	"param_name" => "style",
	"value" => array(
		"Accordion" => "accordion",
		"Toggle" => "toggle",
		"Accordion with icon" => "accordion_with_icon",
		"Toggle with icon" => "toggle_with_icon"
	),
	"description" => __("")
));
vc_add_param("vc_accordion", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background Color"),
	"param_name" => "background_color",
	"value" => __(""),
	"description" => __("")
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Icon"),
	"param_name" => "icon",
	"value" => $icons,
	"description" => __("")
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => __("Title Tag"),
    "param_name" => "title_tag",
    "value" => array(
        ""   => "",
        "h2" => "h2",
        "h3" => "h3",
        "h4" => "h4",	
        "h5" => "h5",	
        "h6" => "h6",	
    ),
    "description" => __("")
));

// Tabs
vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Style"),
	"param_name" => "style",
	"value" => array(
		"Horizontal Center" => "horizontal",
		"Boxed" => "boxed",
		"Vertical Left" => "vertical",
		"Vertical Right" => "vertical_right"
	),
	"description" => __("")
));

// Gallery
vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Column Number"),
	"param_name" => "column_number",
	 "value" => array(2, 3, 4, 5, __("Disable", "js_composer") => 0),
	 "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

// Row
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => __("Row Type"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Section" => "section",
		"Box" => "box",
		"Expandable" => "expandable"
	)
	
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type"),
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full_width"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor ID"),
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Text Align"),
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => __("Video background"),
	"value" => array(__("Use video background?") => "show_video" ),
	"param_name" => "video",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => __("Video overlay"),
	"value" => array(__("Use transparent overlay over video?") => "show_video_overlay" ),
	"param_name" => "video_overlay",
	"description" => __(""),
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (webm) file url"),
	"value" => "",
	"param_name" => "video_webm",
	"description" => __(""),
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (mp4) file url"),
	"value" => "",
	"param_name" => "video_mp4",
	"description" => __(""),
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (ogv) file url"),
	"value" => "",
	"param_name" => "video_ogv",
	"description" => __(""),
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => __("Video preview image"),
	"value" => "",
	"param_name" => "video_image",
	"description" => __(""),
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background color"),
	"param_name" => "background_color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border color"),
	"param_name" => "border_color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding"),
	"value" => "",
	"param_name" => "padding",
	"description" => __("Padding (left/right in % - full width only)"),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Top"),
	"value" => "",
	"param_name" => "padding_top",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Bottom"),
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("More Button Label"),
	"param_name" => "more_button_label",
	"value" =>  __(""),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Less Button Label"),
	"param_name" => "less_button_label",
	"value" =>  __(""),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Button Position"),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color"),
	"param_name" => "color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => __("CSS Animation", "js_composer"),
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => $animations,
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row",  array(
  "type" => "textfield",
  "heading" => __("Transition delay", "js_composer"),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
// Row Inner
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => __("Row Type"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Section" => "section",
		"Box" => "box",
		"Expandable" => "expandable"
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type"),
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full_width"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor ID"),
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Text Align"),
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background color"),
	"param_name" => "background_color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border color"),
	"param_name" => "border_color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding"),
	"value" => "",
	"param_name" => "padding",
	"description" => __("Padding (left/right in % - full width only)"),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Top"),
	"value" => "",
	"param_name" => "padding_top",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Bottom"),
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("More Button Label"),
	"param_name" => "more_button_label",
	"value" =>  __(""),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Less Button Label"),
	"param_name" => "less_button_label",
	"value" =>  __(""),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Button Position"),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color"),
	"param_name" => "color",
	"value" => "",
	"description" => __(""),
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner",  array(
	"type" => "dropdown",
	"heading" => __("CSS Animation", "js_composer"),
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => $animations,
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row_inner",  array(
  "type" => "textfield",
  "heading" => __("Transition delay", "js_composer"),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
// Separator
vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type"),
	"param_name" => "type",
	"value" => array(
		"Normal" => "normal",
		"Transparent" => "transparent",
		"Full width" => "full_width",
                "Small"      => "small"
	),
	"description" => __("")
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Position"),
	"param_name" => "position",
	"value" => array(
		"Center" => "center",
		"Left" => "left",
		"Right" => "right"
	),
    "dependency" => array("element" => "type", "value" => array("small")),
	"description" => __("")
));

vc_add_param("vc_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color"),
	"param_name" => "color",
	"value" => "",
	"description" => __("")
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Thickness"),
	"param_name" => "thickness",
	"value" => "",
	"description" => __("")
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Top Margin"),
	"param_name" => "up",
	"value" => "",
	"description" => __("")
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Bottom Margin"),
	"param_name" => "down",
	"value" => "",
	"description" => __("")
));
vc_add_param("vc_parallax_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor"),
	"param_name" => "anchor",
	"value" => "",
	"description" => __("")
));


// Separator With Text
vc_add_param("vc_text_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Border"),
	"param_name" => "border",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border Color"),
	"param_name" => "border_color",
	"dependency" => Array('element' => "border", 'value' => array('yes'))
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background Color"),
	"param_name" => "background_color",
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Text Color"),
	"param_name" => "text_color",
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Icon Color"),
	"param_name" => "icon_color",
	
));
vc_add_param("vc_text_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Icon"),
	"param_name" => "icon",
	"value" => $icons,
	"description" => __("")
));
vc_add_param("vc_text_separator", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => __("Image"),
	"param_name" => "image"
	
));



//Testimonials
vc_map( array(
		"name" => __("Testimonials"),
		"base" => "testimonials",
		"category" => __('by QODE'),
		"icon" => "icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Transparent" => "transparent"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category"),
				"param_name" => "category",
				"value" => "",
				"description" => __("Category Slug (leave empty for all)")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number"),
				"param_name" => "number",
				"value" => "",
				"description" => __("Number of Testimonials")
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color"),
				"param_name" => "text_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("Only for normal type"),
                "dependency" => Array('element' => "type", 'value' => array('normal'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("Only for normal type"),
                "dependency" => Array('element' => "type", 'value' => array('normal'))
			)
		)
) );
//Portfolio
vc_map( array(
		"name" => __("Portfolio"),
		"base" => "portfolio_list",
		"category" => __('by QODE'),
		"icon" => "icon-wpb-portfolio",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Standard" => "standard",
					"Circle" => "circle",
					"Hover Text" => "hover_text"				
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns"),
				"param_name" => "columns",
				"value" => array(
					"" => "",
					"1" => "1",
					"2" => "2",
					"3" => "3",	
					"4" => "4",	
					"5" => "5",	
					"6" => "6"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Filter"),
				"param_name" => "filter",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Lightbox"),
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Load More"),
				"param_name" => "show_load_more",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number"),
				"param_name" => "number",
				"value" => "-1",
				"description" => __("Number of portolios on page (-1 is all)")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category"),
				"param_name" => "category",
				"value" => "",
				"description" => __("Category Slug (leave empty for all)")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Selected Projects"),
				"param_name" => "selected_projects",
				"value" => "",
				"description" => __("Selected Projects (leave empty for all, delimit by comma)")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            )
		)
) );

//Counter
vc_map( array(
		"name" => __("Counter"),
		"base" => "counter",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-counter",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Zero Counter" => "zero",
					"Random Counter" => "random"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Position"),
				"param_name" => "position",
				"value" => array(
					"Left" => "left",
					"Right" => "right",	
					"Center" => "center"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Digit"),
				"param_name" => "digit",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font size (px)"),
				"param_name" => "font_size",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Color"),
				"param_name" => "font_color",
				"description" => __("")
			)
		)
) );

//Icon List Item
vc_map( array(
		"name" => __("Icon List Item"),
		"base" => "icon_list_item",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icon_list_item",
		"category" => __('by QODE'),
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => __("")
				),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Background Color"),
				"param_name" => "icon_background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Border Color"),
				"param_name" => "icon_border_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
		)
) );
// Call to action
vc_map( array(
		"name" => __("Qode call to action"),
		"base" => "action",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-action",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"With border" => "with_border",
					"Without border" => "without_border"
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"description" => __("Link (only with 'elegant' type)")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Target"),
				"param_name" => "target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent"	
				),
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>I am test text for Call to action.</p>"),
				"description" => __("")
			)
		)
) );
// Blockquote 
vc_map( array(
		"name" => __("Blockquote"),
		"base" => "blockquote",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text"),
				"param_name" => "text",
				"value" => __("Blockquote text")
			),
                        array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color"),
				"param_name" => "text_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width"),
				"param_name" => "width",
				"description" => __("Width (%)")
			),
                        array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("")
			),
		)
) );
// Button 
vc_map( array(
		"name" => __("Button"),
		"base" => "button",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-button",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size"),
				"param_name" => "size",
				"value" => array(
					"Default" => "",
					"Tiny" => "tiny",
					"Small" => "small",	
					"Medium" => "medium",	
					"Large" => "large",	
					"Full Width" => "full_width"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Transparent" => "no_fill"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text"),
				"param_name" => "text",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Target"),
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent",
					"Top" => "_top"	
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Color"),
				"param_name" => "color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Style"),
				"param_name" => "font_style",
				"value" => array(
					"" => "",
					"Normal" => "normal",	
					"Italic" => "italic"
				),
				"description" => __("")
			)
		)
) );
// Image with text 
vc_map( array(
		"name" => __("Image with text"),
		"base" => "image_with_text",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-image_with_text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image"),
				"param_name" => "image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>I am test text for Image with text shortcode.</p>"),
				"description" => __("")
			)
		)
) );

//Message
vc_map( array(
		"name" => __("Qode Message"),
		"base" => "message",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-message",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Icon" => "with_icon"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => __(""),
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __(""),
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Icon"),
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("")
			),
                        array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Close Button Style"),
				"param_name" => "close_button_style",
				"value" => array(
					"Dark" => "dark",
					"Light" => "light"	
				),
				"description" => __("")
                        ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>I am test text for Message shortcode.</p>"),
				"description" => __("")
			)
		)
) );
// Pie Chart
vc_map( array(
		"name" => __("Qode Pie Chart"),
		"base" => "pie_chart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage"),
				"param_name" => "percent",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color"),
				"param_name" => "percentage_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Active Color"),
				"param_name" => "active_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Noactive Color"),
				"param_name" => "noactive_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Pie Chart Line Width (px)"),
				"param_name" => "line_width",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text"),
				"param_name" => "text",
				"description" => __("")
			)
		)
) );
// Pie Chart 2 (Pie)
vc_map( array(
		"name" => __("Qode Pie Chart 2"),
		"base" => "pie_chart2",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart2",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width"),
				"param_name" => "width",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height"),
				"param_name" => "height",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Legend Text Color"),
				"param_name" => "color",
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("15,#f54325,Legend One; 35,#fea899,Legend Two; 50,#ffd7d0,Legend Three"),
				"description" => __("")
			)

		)
) );
// Pie Chart 3 (Doughnut)
vc_map( array(
		"name" => __("Qode Pie Chart 3"),
		"base" => "pie_chart3",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart3",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width"),
				"param_name" => "width",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height"),
				"param_name" => "height",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Legend Text Color"),
				"param_name" => "color",
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("15,#f54325,Legend One; 35,#fea899,Legend Two; 50,#ffd7d0,Legend Three"),
				"description" => __("")
			)

		)
) );
// Horizontal progress bar shortcode
vc_map( array(
		"name" => __("Qode Horizontal progress bar shortcode"),
		"base" => "progress_bar",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-progress_bar",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage"),
				"param_name" => "percent",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color"),
				"param_name" => "percent_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Background Color"),
				"param_name" => "active_background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("No active Background Color"),
				"param_name" => "noactive_background_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Progress Bar Height (px)"),
				"param_name" => "height",
				"description" => __("")
			)
	
		)
) );

// Vertical progress bar shortcode
vc_map( array(
		"name" => __("Qode Vertical progress bar shortcode"),
		"base" => "progress_bar_vertical",
		"icon" => "icon-wpb-progress_bar",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Size"),
				"param_name" => "title_size",
				"description" => __("")
			),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percent"),
				"param_name" => "percent",
				"description" => __("")
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Text Size"),
				"param_name" => "percentage_text_size",
				"description" => __("")
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color"),
				"param_name" => "percent_color",
				"description" => __("")
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text"),
				"param_name" => "text",
				"value" => __("Put some content here"),
				"description" => __("")
			)
		)
) );

// Icon Progress Bar
vc_map( array(
		"name" => __("Icon Progress Bar"),
		"base" => "progress_bar_icon",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-progress_bar_icon",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Icons"),
				"param_name" => "icons_number",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Active Icons"),
				"param_name" => "active_number",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => __("")
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size"),
				"param_name" => "size",
				"value" => array(
					"Tiny" => "tiny",
					"Small" => "small",
					"Medium" => "medium",	
					"Large" => "large"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Size (px)"),
				"param_name" => "custom_size",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __("")
			),

			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Active Color"),
				"param_name" => "icon_active_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Active Color"),
				"param_name" => "background_active_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("Only for Square type"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Active Color"),
				"param_name" => "border_active_color",
				"description" => __("Only for Square type"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			)
	
		)
) );


// Line Graph shortcode
vc_map( array(
		"name" => __("Line Graph"),
		"base" => "line_graph",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-line_graph",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"" => "",
					"Rounded edges" => "rounded",
					"Sharp edges" => "sharp"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width"),
				"param_name" => "width",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height"),
				"param_name" => "height",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Color"),
				"param_name" => "custom_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Scale steps"),
				"param_name" => "scale_steps",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Scale step width"),
				"param_name" => "scale_step_width",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Labels"),
				"param_name" => "labels",
				"value" => __("Label 1, Label 2, Label 3")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("#f54325,Legend One,1,5,10;#fea899,Legend Two,3,7,20;#ffd7d0,Legend Three,10,2,34"),
				"description" => __("")
			)
		)
) );

// Pricing table shortcode
vc_map( array(
		"name" => __("Pricing table shortcode"),
		"base" => "pricing_column",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pricing_column",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"value" => __("Basic Plan"),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Price"),
				"param_name" => "price",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Currency"),
				"param_name" => "currency",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Price Period"),
				"param_name" => "price_period",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target"),
				"param_name" => "target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent"
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Button Text"),
				"param_name" => "button_text",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active"),
				"param_name" => "active",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"	
				),
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<li>content content content</li><li>content content content</li><li>content content content</li>"),
				"description" => __("")
			)
		)
) );

// Social Share
vc_map( array(
		"name" => __("Social share"),
		"base" => "social_share",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-social_share",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"show_settings_on_create" => false
) );

// Custom Font
vc_map( array(
		"name" => __("Custom Font"),
		"base" => "custom_font",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-custom_font",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font family"),
				"param_name" => "font_family",
				"value" => __("Oswald")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font size"),
				"param_name" => "font_size",
				"value" => __("15")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line height"),
				"param_name" => "line_height",
				"value" => __("26")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Style"),
				"param_name" => "font_style",
				"value" => array(
					"Normal" => "normal",
					"Italic" => "italic"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Align"),
				"param_name" => "text_align",
				"value" => array(
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font weight"),
				"param_name" => "font_weight",
				"value" => __("300")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Color"),
				"param_name" => "color",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text decoration"),
				"param_name" => "text_decoration",
				"value" => array(
					"None" => "none",
					"Underline" => "underline",
					"Overline" => "overline",
					"Line Through" => "line-through"	
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Padding (px)"),
				"param_name" => "padding",
				"value" => __("0")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Margin (px)"),
				"param_name" => "margin",
				"value" => __("0")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>content content content</p>"),
				"description" => __("")
			)
	
		)
) );

// Ordered List
vc_map( array(
		"name" => __("Ordered List"),
		"base" => "ordered_list",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-ordered_list",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>"),
				"description" => __("")
			)

		)
) );

// Unordered List

vc_map( array(
		"name" => __("Unordered List"),
		"base" => "unordered_list",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-unordered_list",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Style"),
				"param_name" => "style",
				"value" => array(
					"Circle" => "circle",
					"Number" => "number"
				),
				"description" => __("")
			),
            array(
                    "type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number Type"),
				"param_name" => "number_type",
				"value" => array(
					"Circle" => "circle_number",
					"Transparent" => "transparent_number"
				),
				"description" => __(""),
                                "dependency" => array('element' => "style", 'value' => array('number'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animate List"),
				"param_name" => "animate",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Weight"),
				"param_name" => "font_weight",
				"value" => array(
                    "Default" => "",
					"Light" => "light",
					"Normal" => "normal",
                    "Bold" => "bold"
				),
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>"),
				"description" => __("")
			)
		)
) );

// Icon
vc_map( array(
		"name" => __("Icon"),
		"base" => "icons",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icons",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size"),
				"param_name" => "size",
				"value" => array(
					"Tiny" => "icon-large",
					"Small" => "icon-2x",
					"Medium" => "icon-3x",	
					"Large" => "icon-4x"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Size (px)"),
				"param_name" => "custom_size",
				"value" => __("")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Position"),
				"param_name" => "position",
				"value" => array(
					"Normal" => "",
					"Left" => "left",
					"Right" => "right"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border"),
				"param_name" => "border",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color"),
				"param_name" => "border_color",
				"description" => __("Only for Square type"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Margin"),
				"param_name" => "margin",
				"description" => __("Margin (top right bottom left)")
			)
	
		)
) );

// Social Icon 
vc_map( array(
		"name" => __("Social Icon"),
		"base" => "social_icons",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-social_icons",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => array(
					"ADN" => "icon-adn",
					"Android" => "icon-android",
					"Apple" => "icon-apple",
					"Bitbucket" => "icon-bitbucket",	
					"Bitbucket-Sign" => "icon-bitbucket-sign",	
					"Bitcoin" => "icon-bitcoin",	
					"BTC" => "icon-btc",	
					"CSS3" => "icon-css3",	
					"Dribbble" => "icon-dribbble",	
					"Dropbox" => "icon-dropbox",	
					"Facebook" => "icon-facebook",	
					"Facebook-Sign" => "icon-facebook-sign",	
					"Flickr" => "icon-flickr",	
					"Foursquare" => "icon-foursquare",	
					"GitHub" => "icon-github",	
					"GitHub-Alt" => "icon-github-alt",	
					"GitHub-Sign" => "icon-github-sign",	
					"Gittip" => "icon-gittip",	
					"Google Plus" => "icon-google-plus",	
					"Google Plus-Sign" => "icon-google-plus-sign",	
					"HTML5" => "icon-html5",	
					"Instagram" => "icon-instagram",	
					"LinkedIn" => "icon-linkedin",	
					"LinkedIn-Sign" => "icon-linkedin-sign",	
					"Linux" => "icon-linux",	
					"MaxCDN" => "icon-maxcdn",	
					"Pinterest" => "icon-pinterest",	
					"Pinterest-Sign" => "icon-pinterest-sign",	
					"Renren" => "icon-renren",	
					"Skype" => "icon-skype",	
					"StackExchange" => "icon-stackexchange",	
					"Trello" => "icon-trello",	
					"Tumblr" => "icon-tumblr",	
					"Tumblr-Sign" => "icon-tumblr-sign",	
					"Twitter" => "icon-twitter",	
					"Twitter-Sign" => "icon-twitter-sign",	
					"VK" => "icon-vk",	
					"Weibo" => "icon-weibo",	
					"Windows" => "icon-windows",	
					"Xing" => "icon-xing",	
					"Xing-Sign" => "icon-xing-sign",	
					"YouTube" => "icon-youtube",	
					"YouTube Play" => "icon-youtube-play",	
					"YouTube-Sign" => "icon-youtube-sign",	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size"),
				"param_name" => "size",
				"value" => array(
					"Small" => "icon-large",
					"Normal" => "icon-2x",	
					"Large" => "icon-3x"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"value" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target"),
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent"	
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("")
			)
		)
) );

// Icon with Text
vc_map( array(
		"name" => __("Icon With Text"),
		"base" => "icon_text",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icon_text",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box type"),
				"param_name" => "box_type",
				"value" => array(
					"Normal" => "normal",
					"Icon in a box" => "icon_in_a_box"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Border"),
				"param_name" => "box_border",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Border Color"),
				"param_name" => "box_border_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Background Color"),
				"param_name" => "box_background_color",
				"description" => __(""),
				"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Type"),
				"param_name" => "icon_type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Size"),
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "icon-large",
					"Small" => "icon-2x",
					"Medium" => "icon-3x",	
					"Large" => "icon-4x"	
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Icon Size (px)"),
				"param_name" => "custom_icon_size",
				"value" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation"),
				"param_name" => "icon_animation",
				"value" => array(
					"No" => "",
					"Yes" => "q_icon_animation"
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation Delay (ms)"),
				"param_name" => "icon_animation_delay",
				"value" => __(""),
                "description" => ""
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image"),
				"param_name" => "image"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Position"),
				"param_name" => "icon_position",
				"value" => array(
					"Top" => "top",
					"Left" => "left"	
				),
				"description" => __("Icon Position (only for normal box type)"),
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Margin"),
				"param_name" => "icon_margin",
				"value" => __(""),
                "description" => "Margin should be set in a top right bottom left format"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Border Color"),
				"param_name" => "border_color",
				"description" => __("Only for Square type"),
				"dependency" => Array('element' => "icon_type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color"),
				"param_name" => "icon_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Background Color"),
				"param_name" => "icon_background_color",
				"description" => __("Icon Background Color (only for square and circle icon type)"),
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"value" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text"),
				"param_name" => "text",
				"value" => __("")
			),
                        array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
                        array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color"),
				"param_name" => "text_color",
				"description" => __("")
			),
		)
) );

// Latest Posts 

vc_map( array(
		"name" => __("Latest Posts"),
		"base" => "latest_post",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-latest_post",
		"category" => __('by QODE'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Posts per Row"),
				"param_name" => "post_number_per_row",
				"value" => array(
					"2" => "2",
					"3" => "3",
					"4" => "4"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Rows"),
				"param_name" => "rows",
				"value" => array(
					"1" => "1",
					"2" => "2",
					"3" => "3"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Rows"),
				"param_name" => "rows",
				"value" => array(
					"1" => "1",
					"2" => "2",
					"3" => "3"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By"),
				"param_name" => "order_by",
				"value" => array(
					"Menu Order" => "menu_order",
					"Title" => "title",
					"Date" => "date"
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order"),
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category Slug"),
				"param_name" => "category",
				"description" => __("Leave empty for all or use comma for list")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text length"),
				"param_name" => "text_length",
				"description" => __("Number of caracters")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            )
		)
) );


// Steps
vc_map( array(
		"name" => __("Steps"),
		"base" => "steps",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-steps",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Number Of Steps"),
				"param_name" => "number_of_steps",
				"value" => array(
                    "Deafult"   => "",
					"2" => "2",
					"3" => "3",
					"4" => "4"	
				),
				"description" => __("Number of steps in the process")
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color"),
				"param_name" => "background_color",
				"description" => __("Background color of the step holder")
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number Color"),
				"param_name" => "number_color",
				"description" => __("")
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
            ),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "Default",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
            
            //first step config
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title 1"),
				"param_name" => "title_1",
				"description" => __("")
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 1"),
				"param_name" => "step_number_1",
				"description" => __("")
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Description 1"),
				"param_name" => "step_description_1",
				"description" => __("")
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 1"),
				"param_name" => "step_link_1",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 1"),
				"param_name" => "step_link_target_1",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => __("")
            ),
            
            //second step config
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title 2"),
				"param_name" => "title_2",
				"description" => __("")
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 2"),
				"param_name" => "step_number_2",
				"description" => __("")
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Description 2"),
				"param_name" => "step_description_2",
				"description" => __("")
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 2"),
				"param_name" => "step_link_2",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 2"),
				"param_name" => "step_link_target_2",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => __("")
            ),
            
            
            //third step config
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title 3"),
				"param_name" => "title_3",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 3"),
				"param_name" => "step_number_3",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Description 3"),
				"param_name" => "step_description_3",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 3"),
				"param_name" => "step_link_3",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 3"),
				"param_name" => "step_link_target_3",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => __("")
            ),
            
            //fourth step config
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title 4"),
				"param_name" => "title_4",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 4"),
				"param_name" => "step_number_4",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Description 4"),
				"param_name" => "step_description_4",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 4"),
				"param_name" => "step_link_4",
				"description" => __(""),
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 4"),
				"param_name" => "step_link_target_4",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => __("")
            )
		)
) );

// Image with text over
vc_map( array(
		"name" => __("Image with text over"),
		"base" => "image_with_text_over",
		"category" => __('by QODE'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-image_with_text_over",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image"),
				"param_name" => "image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "title_color",
				"description" => __("")
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Size"),
				"param_name" => "title_size",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => __("")
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Subtitle"),
				"param_name" => "subtitle",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Subtitle Color"),
				"param_name" => "subtitle_color",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line Color"),
				"param_name" => "line_color",
				"description" => __("")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>I am test text for Image with text shortcode.</p>"),
				"description" => __("")
			)
		)
) );

/**
 * Service shortcode
 */
vc_map( array(
		"name" => __("Service"),
		"base" => "service",
		"category" => __('by QODE'),
		"icon" => "icon-wpb-service",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type"),
				"param_name" => "type",
                                "value" => array(
					"" => "",
					"Top" => "top",
					"Left" => "left"
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title"),
				"param_name" => "title",
				"description" => __("")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color"),
				"param_name" => "color",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target"),
				"param_name" => "target",
				"description" => __(""),
                                "value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank"
				)
                            
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animate"),
				"param_name" => "animate",
				"description" => __(""),
                "value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"
				)
                            
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content"),
				"param_name" => "content",
				"value" => __("<p>I am test text for service shortcode.</p>"),
				"description" => __("")
			)
		)
) );

// Image hover
vc_map( array(
		"name" => __("Image hover"),
		"base" => "image_hover",
		"category" => __('by QODE'),
		"icon" => "icon-wpb-image_hover",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image"),
				"param_name" => "image"
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Hover Image"),
				"param_name" => "hover_image"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link"),
				"param_name" => "link",
				"description" => __("")
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation"),
				"param_name" => "animation",
				"description" => __(""),
                "value" => array(
                    "" => "",
                    "Yes" => "yes",
                    "No" => "no"
                )
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Transition delay"),
				"param_name" => "transition_delay",
				"description" => __(""),
                "dependency" => array('element' => "animation", 'value' => array("yes"))
			)
		)
) );

/***************** Woocommerce Shortcodes *********************/

if(function_exists("is_woocommerce")){

/**** Order Tracking ***/

vc_map( array(
		"name" => __("Order Tracking"),
		"base" => "woocommerce_order_tracking",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_order_tracking",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/*** Product price/cart button ***/
	
vc_map( array(
		"name" => __("Product price/cart button"),
		"base" => "add_to_cart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-add_to_cart",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("ID"),
				"param_name" => "id",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKU"),
				"param_name" => "sku",
				"description" => __("")
			)
		)
) );

/*** Product by SKU/ID ***/
	
vc_map( array(
		"name" => __("Product by SKU/ID"),
		"base" => "product",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("ID"),
				"param_name" => "id",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKU"),
				"param_name" => "sku",
				"description" => __("")
			)
		)
) );


/*** Products by SKU/ID ***/
	
vc_map( array(
		"name" => __("Products by SKU/ID"),
		"base" => "products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-products",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("IDS"),
				"param_name" => "ids",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKUS"),
				"param_name" => "skus",
				"description" => __("")
			)
		)
) );

/*** Product categories ***/
	
vc_map( array(
		"name" => __("Product categories"),
		"base" => "product_categories",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product_categories",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number"),
				"param_name" => "number",
				"description" => __("")
			)
		)
) );

/*** Products by category slug ***/
	
vc_map( array(
		"name" => __("Products by category slug"),
		"base" => "product_category",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product_category",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category"),
				"param_name" => "category",
				"description" => __("")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page"),
				"param_name" => "per_page",
				"value" => __("12")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns"),
				"param_name" => "columns",
				"value" => __("4")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => __("")
			),
		)
) );

/*** Recent products ***/
	
vc_map( array(
		"name" => __("Recent products"),
		"base" => "recent_products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-recent_products",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page"),
				"param_name" => "per_page",
				"value" => __("12")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns"),
				"param_name" => "columns",
				"value" => __("4")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => __("")
			),
		)
) );

/*** Featured products ***/
	
vc_map( array(
		"name" => __("Featured products"),
		"base" => "featured_products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-featured_products",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page"),
				"param_name" => "per_page",
				"value" => __("12")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns"),
				"param_name" => "columns",
				"value" => __("4")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => __("")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => __("")
			),
		)
) );

/**** Shop Messages ***/

vc_map( array(
		"name" => __("Shop Messages"),
		"base" => "woocommerce_messages",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_messages",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Cart ***/

vc_map( array(
		"name" => __("Pages - Cart"),
		"base" => "woocommerce_cart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_cart",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Checkout ***/

vc_map( array(
		"name" => __("Pages - Checkout"),
		"base" => "woocommerce_checkout",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_checkout",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** My Account ***/

vc_map( array(
		"name" => __("Pages - My Account"),
		"base" => "woocommerce_my_account",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_my_account",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Edit Address ***/

vc_map( array(
		"name" => __("Pages - Edit Address"),
		"base" => "woocommerce_edit_address",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_edit_address",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Change Password ***/

vc_map( array(
		"name" => __("Pages - Change Password"),
		"base" => "woocommerce_change_password",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_change_password",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** View Order ***/

vc_map( array(
		"name" => __("Pages - View Order"),
		"base" => "woocommerce_view_order",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_view_order",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Pay ***/

vc_map( array(
		"name" => __("Pages - Pay"),
		"base" => "woocommerce_pay",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_pay",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Thankyou ***/

vc_map( array(
		"name" => __("Pages - Thankyou"),
		"base" => "woocommerce_thankyou",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_thankyou",
		"category" => __('Woocommerce'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

}
?>