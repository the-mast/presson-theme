<div class="social-media-following">
	<p>Stay updated, follow <?php echo esc_attr( get_bloginfo('name') ); ?></p>
	<div class="fb-like-section">
		<div class="fb-like" data-href="<?php echo esc_attr( get_option('po_facebook_url') ); ?>" data-width="100" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
	</div>
	<div class="tw-follow-section">
		<a href="https://twitter.com/<?php echo esc_attr( get_option('po_twitter_id') ); ?>" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false">Follow @<?php echo esc_attr( get_option('po_twitter_id') ); ?></a>
	</div>
</div>