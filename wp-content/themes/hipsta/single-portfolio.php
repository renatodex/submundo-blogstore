<?php get_header(); ?>

<div class="page-section">
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content-portfolio' );

				wi_portfolio_nav();
			endwhile;
		?>
	</div>
</div>

<?php get_footer(); ?>