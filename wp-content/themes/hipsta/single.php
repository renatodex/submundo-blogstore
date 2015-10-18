<?php get_header(); ?>

<div class="page-section">
	<div class="container">

		<div class="eight columns">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content' );

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div>

		<?php get_sidebar(); ?>
		<?php wi_post_nav(); ?>

	</div>
</div>

<?php get_footer(); ?>