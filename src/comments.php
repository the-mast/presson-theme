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

<div id="comments" class="comments-area">

<?php if ( get_query_var('comments', 0) ): ?>
	<div class="button">
		<a href="<?php echo esc_url( add_query_arg( array( 'comments' => 0 ), get_permalink() ) ) ?>">Hide Comments</a>
	</div>
	<div class="fb-comments hidden" data-href="<?php echo esc_url( get_permalink()) ?>" data-width="640" data-numposts="5"></div>
<?php else: ?>
	<div class="button">
		<a href="<?php echo esc_url( add_query_arg( array( 'comments' => 1 ), get_permalink() . "#comments" ) ) ?>">Show Comments</a>
	</div>
<?php endif; ?>

</div><!-- #comments -->
