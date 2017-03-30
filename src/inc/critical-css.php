<?php 
/*
 * Embed the critical path CSS
 * Run `gulp critical-css` and take the minified css at ./dist/critical.css
 */
function critical_css() {
  echo '<style id=\'press-on-critical-css\' >';
  include get_template_directory() . '/critical.css';
  echo '</style>';
};

add_action( 'wp_head', 'critical_css' );
?>

