<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Press_On
 */

?>


<article class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php render_banner_advertisment() ?>	
	
	<header id="social_share_header" class="header">
		<div class="container" >
			<div id="sharing">
			<div class="presson-social-media-links">
				<div class="fb-share">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink()) ?>">
						<span />
					</a>
				</div>
				<div class="tw-share">
					<a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() ?>&url=<?php echo esc_url( get_permalink()) ?>" >
						<span />
					</a>
				</div>
				<div class="wa-share">
					<?php
						$articleTitle = str_replace(' ', '%20', get_the_title());
					?>
					<a href="whatsapp://send?text=<?php echo $articleTitle ?>%20<?php echo esc_url( get_permalink()) ?>" data-action="share/whatsapp/share" >
						<span />
					</a>
				</div>
			</div>	
			</div>
		</div>
	</header>
	<header>	
		<?php
			get_template_part( 'template-parts/content-article-head', 'none' );
		?>
		<div class="article-info">
			<?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<p>by <span class="article-author"><?php the_author()?></span></p>
					<p class="article-date"><?php the_time('jS F Y')?></p>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</div>
	</header><!-- .entry-header -->
    <section class="article-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'press-on' ), array(
					'span' => array(
						'class' => array(),
					),
				) ),
				the_title( '<span class="article-title">', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'press-on' ),
				'after'  => '</div>',
			) );
		?>
	</section>
	<?php comments_template(); ?>

	<!-- .entry-content -->
	<section class="read-next-article">
		<?php 
			get_template_part( 'template-parts/content-next', 'none' );
		?>
	</section>
	<section class="related-stuff">
		<?php
			get_template_part( 'template-parts/content-related');
		?>
	</section>

	<?php
		get_template_part( 'template-parts/content-social-media-following', 'none' );
	?>

	<footer class="entry-footer">
		<?php press_on_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<script src="https://rawgithub.com/WickyNilliams/headroom.js/gh-pages/assets/scripts/main.js"></script>
</article><!-- #post-## -->
