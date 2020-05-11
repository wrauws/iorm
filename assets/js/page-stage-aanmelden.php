<?php 

/**
 * Template Name: Inschrijfformulier
 * Description: 
 *
 */ 


acf_form_head();

get_header(); ?>

			

<?php get_template_part( 'parts/page-header-1col'); ?> 



	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
		
			
				
					<?php the_content(); ?>
		</article><?php // end article ?>	
		
			<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part('includes/template','error'); // WordPress template error message ?>

	<?php endif; ?>

		<div id="inschijven">			
				<?php 

acf_form(array(
	
		// 'post_title'	=> false,
		// 'post_content'	=> false,
		'field_groups'       => array(2582), // Create post field group ID(s)
		'form'               => TRUE,
		//'return'             => home_url('overzicht'), 
		'html_before_fields' => '',
		'html_after_fields'  => '',
		'submit_value'       =>  __('Submit', 'uu2014'),
		'updated_message'    => __('Sent', 'uu2014'),
		// 'new_post' => TRUE,
		'post_title' => TRUE,
		'honeypot' => true,
	));

 ?>
			
 		</div>
				
		
<script>





</script>			
		
	


<?php get_template_part( 'parts/page-footer-1col'); ?> 

<?php get_footer();