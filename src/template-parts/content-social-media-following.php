<div class="social-media-container">
	<div class="social-media-following">
		<p>get</p>
		<div class="social-icon"></div>
		<p>in your newsfeed:</p>

		<div class="sharing-icons">
			<div class="fb-like-section">
				<div class="fb-like" data-href="<?php echo esc_attr( get_option('po_facebook_url') ); ?>" data-size="large" data-width="100" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
			</div>
			<div class="tw-follow-section">
				<a href="https://twitter.com/<?php echo esc_attr( get_option('po_twitter_id') ); ?>" data-size="large" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false">Follow @<?php echo esc_attr( get_option('po_twitter_id') ); ?></a>
			</div>
		</div>
	</div>
</div>