<ul class="term-menu terms-full">
	<li class="themetag-item">
		<?php 
		
		$terms = wp_get_post_terms($post->ID, 'rw_theme');
		if ($terms) {
			$output = array();
			foreach ($terms as $term) {
				$output[] = '<a href="' .get_term_link( $term->slug, 'rw_theme') .'">' .$term->name .'</a>';
			}
			echo join( '', $output );
		};
		
		?>
	</li>
<?php if(is_singular('events')) { ?>
	<li class="category-item">
		<?php 
		
		$terms = wp_get_post_terms($post->ID, 'event_category');
		if ($terms) {
			$output = array();
			foreach ($terms as $term) {
				$output[] = '<a href="' .get_term_link( $term->slug, 'event_category') .'">' .$term->name .'</a>';
			}
			echo join( '', $output );
		};
		
		?>
	</li>
<?php } ?>
	<li class="category-item">
		<?php the_category( '</li><li class="category-item">' ); ?>

	</li>
	<?php the_tags('<li class="tag-item">', '</li><li class="tag-item">', '</li>'); ?>
</ul>