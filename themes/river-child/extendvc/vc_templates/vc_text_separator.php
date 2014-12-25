<?php
$output = $title = $title_align = $el_class = '';
extract(shortcode_atts(array(
    'title' => __("Title", "js_composer"),
    'title_align' => 'separator_align_center',
    'border' => '',
    'border_color' => '',
    'text_color' => '',
    'icon_color' => '',
    'background_color' => '',
    'icon' => '',
    'image' => '',
    'el_class' => ''
), $atts));
$el_class = $this->getExtraClass($el_class);
if($icon != "" || $image !=""){
	$icon_class = " icon_image";
}else{
	$icon_class = "";
}
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_text_separator wpb_content_element full '.$title_align.$el_class, $this->settings['base']);
$output .= '<div class="'.$css_class. $icon_class .'"><div';
if($border != "" || $border_color != "" || $text_color != ""){
		$output .= " style='";
			if($background_color != ""){
				$output .="background-color:".$background_color.";";
			}
			if($border_color != ""){
				$output .=" border:1px solid ".$border_color.";";
			}
			if($text_color != ""){
				$output .=" color:".$text_color.";";
			}
		$output.="'";
	}
$output .= '>';
if($image != "") {
	if(is_numeric($image)) {
		$image_src = wp_get_attachment_url( $image ); 
	}else {
		$image_src = $image; 
	}
	$output .= '<span class="separator_line_image"><img src="'. $image_src .'"/></span>';

}
elseif($icon != "") {
	$output .= '<span class="icon '.$icon.'"';
	
	if($icon_color != ""){
		$output .= " style='";
			if($icon_color != ""){
				$output .= "color:".$icon_color . ";";
			}
		$output.="'";
	}
$output .= '>';
	
	$output .= '</span>';
}

$output .= '<span>' . $title . '</span>';

$output .='</div></div>'.$this->endBlockComment('separator')."\n";

echo $output;