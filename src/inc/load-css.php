<?php 
/**
 * Load non-critical CSS asynchronously
 */

function load_css_async($html, $handle, $href, $media) {
    $css_handles = array('press-on-style');

    foreach($css_handles as $css_handle) {
      if ($css_handle === $handle) {
	echo '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
	return str_replace("rel='stylesheet'", "rel='preload' as='style' onload='this.rel=\"stylesheet\";'", $html);
      }
      else{
	  return $html;
      }
    }
}
add_filter('style_loader_tag', 'load_css_async', 10, 4);


function inline_loadcss_scripts($html) {
    echo '<script id="loadcss-scripts" type="text/javascript">';
    include get_template_directory() . '/assets/js/loadCSS.js';
    include get_template_directory() . '/assets/js/cssrelpreload.js';
    echo '</script>';
    return $html;
}
add_action('wp_head', 'inline_loadcss_scripts');

?>

