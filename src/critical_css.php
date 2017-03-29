<?php 
/*
 * Embed the critical path CSS
 * Run `gulp critical-css` and take the minified css at ./dist/critical.css
 */

function critical_css() {
  $critical_css_file = get_template_directory_uri() . '/critical.css';
  $critical_css_content = file_get_contents($critical_css_file);

  wp_add_inline_style('press-on-style', $critical_css_content);
};

add_action( 'wp_enqueue_style', 'critical_css' );
?>

