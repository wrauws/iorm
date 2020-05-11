<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</header><!-- .page-header -->




<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<div class="entry-meta">
			<?php irw_post_authors( get_the_ID() ); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<dl>
		<?php if(get_field('pub_type_of_publication')) {
			echo '<dt>Type of publication</dt>' . '<dd>' . get_field('pub_type_of_publication') . '</dd>';
		} ?>
		<?php if(get_field('pub_publisher')) {
			echo '<dt>Publisher</dt>' . '<dd>' . get_field('pub_publisher') . '</dd>';
		} ?>
		<?php if(get_field('pub_editor')) {
			echo '<dt>Editor</dt>' . '<dd>' . get_field('pub_editor') . '</dd>';
		} ?>
		<?php if(get_field('pub_date')) {
			echo '<dt>Date</dt>' . '<dd>' . get_field('pub_date') . '</dd>';
		} else {
			echo '<dt>Expected Date</dt>' . '<dd>' . get_field('pub_expected_date') . '</dd>';
		} ?>
		<?php if(get_field('pub_url')) {
			echo '<dt>Url</dt>' . '<dd><a href="'. get_field('pub_url') .'" target="_blank">' . get_field('pub_url') . '</a></dd>';
		} ?>
		<?php if(get_field('pub_doi')) {
			echo '<dt>DOI</dt>' . '<dd><a href="'. get_field('pub_doi') .'" target="_blank">' . get_field('pub_doi') . '</a></dd>';
		} ?>
		</dl>
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
