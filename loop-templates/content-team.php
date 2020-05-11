<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



?>



<div class="col-sm-4 author">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <a href="<?php echo get_author_posts_url($user->ID); ?>">
            <?php
                $user_string = 'user_' . $user->ID;
                $name = get_field('author_full', $user_string);
                $image = get_field('author_image', $user_string);
                $function = get_field('author_title', $user_string);
                $author_short_description = get_field('author_short_description', $user_string);
               
                if( !empty( $image ) ): 
                	$image_atts = wp_get_attachment_image_src( $image, 'large' );
            ?>
            <div class="author-image" style="background-image: url(<?php echo $image_atts[0]; ?>)">    
            	
        	</div>
            <?php
                endif;
            ?>
            
            <h2 class="author_title"><?php echo $name; ?></h2>
            <p class="author_function"><?php echo $function; ?></p>
            <p class="author_institute"><?php echo $author_short_description;?></p>
        </a>
    </article>      
</div><!-- col -->

