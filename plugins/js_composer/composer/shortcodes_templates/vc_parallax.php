<?php
$output = $title = '';
//
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'active_tab' => '1'
), $atts));

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'parallax '.$el_class.' not-column-inherit', $this->settings['base']);

$output .= '<section class="'.$css_class.'">';

$output .= wpb_js_remove_wpautop($content);
$output .= '</section> '.$this->endBlockComment('.wpb_parallax');

echo $output;