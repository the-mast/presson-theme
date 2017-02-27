<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Mast
 */

?>


<article class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>	
		<?php
			get_template_part( 'template-parts/content-featured', 'none' );
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
		<div class="mast-social-media-links">
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
		</div>
	</header><!-- .entry-header -->
    <section class="article-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the-mast' ), array(
					'span' => array(
						'class' => array(),
					),
				) ),
				the_title( '<span class="article-title">', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the-mast' ),
				'after'  => '</div>',
			) );
		?>
	</section>
	<!-- .entry-content -->
	<section class="related-stuff">
		<?php
			get_template_part( 'template-parts/content-related');
		?>
	</section>

	<?php
		get_template_part( 'template-parts/content-social-media-following', 'none' );
	?>

	<footer class="entry-footer">
		<?php the_mast_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
