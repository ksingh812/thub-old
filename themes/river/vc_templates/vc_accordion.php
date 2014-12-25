<?php
$output = $title = $interval = $el_class = $collapsible = $active_tab = $style = '';
//
   
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'active_tab' => '1',
	'style' => 'accordion',
	'background_color' => ''
), $atts));

$acc_class = "";
if($style == "toggle") {
	$acc_class .= "toggle";
} else if($style == "accordion_with_icon") {
	$acc_class = "accordion with_icon";
}else if($style == "toggle_with_icon") {
	$acc_class .= "toggle with_icon";
}
 else {
	$acc_class = "accordion";
}
$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'accordion_holder clearfix wpb_content_element '. $acc_class ." " . $el_class.' not-column-inherit', $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.'"';
if($background_color != ""){
	$output .= ' style="background-color:' . $background_color . '"';
}
$output .= '>'; //data-interval="'.$interval.'"
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_accordion');

echo $output;