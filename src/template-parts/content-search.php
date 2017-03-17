<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Press_On
 */

?>

<?php
	$title  = get_the_title();
	$body = get_the_excerpt();
	$keys= explode(" ",$s);
	$title  = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $title);
	$body  = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $body);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="search-results-story">
		<div class="results-story-title">	
			<h3><a href="<?php the_permalink(); ?>"><?php echo $title ?></a></h3>
		</div>
		<div class="results-story-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<!--<span/>-->
		</div>
		<div class="entry-summary">
			<?php echo $body ?>
		</div><!-- .entry-summary -->
		<div class="results-story-date">
			<?php the_time('jS F Y') ?>
		</div>
	</div>


</article><!-- #post-## -->
