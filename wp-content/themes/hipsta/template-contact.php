<?php

/*
 * Template Name: Contact
*/

get_header(); ?>

<div class="page-section">

	<div class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<p class="wp-link-pages"><span>' . __( 'Pages:', 'weekendid' ) . '</span>'
				)
			);
		?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>