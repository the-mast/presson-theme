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
		if ( has_post_thumbnail() ) : ?>
		<div class="image-container">
			<?php the_post_thumbnail(); ?>
			<div class="image-box">
				<div class="title-overlay">
					<?php
					if ( is_single() ) :
						the_title( '<h2 class="article-title">', '</h2>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>
				</div>
			</div>
					<?php
					else :
						if ( is_single() ) :
								the_title( '<h1>', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
					endif;?>
		</div>
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
				<div class="fb-share-button" data-href="<?php esc_url( get_permalink() ) ?>" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
			</div>
			<div class="tw-share">
				<a class="twitter-share-button"
					href="https://twitter.com/intent/tweet?text=<?php get_the_title() ?>"
					data-size="small">
					Tweet
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
			get_template_part( 'template-parts/content-related', 'none' );
		?>
	</section>

	<?php
		get_template_part( 'template-parts/content-social-media-following', 'none' );
	?>

	<footer class="entry-footer">
		<?php the_mast_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
