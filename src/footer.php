<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Press_On
 */

?>

	</div><!-- #content -->

	<div id="mastfoot">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="logo-footer">
				<span></span>
			</div>

			<div id="follow-us-footer">
				<p> Find Us: </p>
				<div>
					<a href="<?php echo esc_attr( get_option('po_facebook_url') ); ?>">
							<span class="fb-follow"></span>
					</a>
				</div>
				<div>
					<a href="https://twitter.com/<?php echo esc_attr( get_option('po_twitter_id') ); ?>">
							<span class="tw-follow"></span>
					</a>
				</div>
			</div>

			<div class="site-info">
				<a href="mailto:<?php echo esc_attr( get_option('po_mailto_address') ); ?>"><p> Contact Us </p></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
