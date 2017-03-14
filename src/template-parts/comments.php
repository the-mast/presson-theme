<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="button">
    <a href="<?php echo esc_url( add_query_arg( array( 'comments' => 1 ), get_permalink() ) ) ?>">Show Comments</a>
</div>

<?php if ( get_query_var('comments', 0) ): ?>
    <div class="fb-comments hidden" data-href="<?php echo esc_url( get_permalink()) ?>" data-width="640" data-numposts="5"></div>
<?php endif; ?>