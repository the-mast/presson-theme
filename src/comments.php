<?php
/**
 * The template for displaying comments
 *
 * Commenting is supplied by the Facebook Social comments plugin:
 * https://developers.facebook.com/docs/plugins/comments/
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Press_On
 */

?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="comments-header">
	<button class="button" id="comments-btn">
		Show Comments (<span class="fb-comments-count" data-href="<?php echo esc_url( get_permalink()) ?>"></span>)
	</button>
</div>

<div id="comments" class="comments-area hidden">
	<div class="fb-comments" data-href="<?php echo esc_url( get_permalink()) ?>" data-width="640" data-numposts="5"></div>
</div><!-- #comments -->
