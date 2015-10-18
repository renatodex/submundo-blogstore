<?php get_header(); ?>

<div class="page-section">
	<div class="container">
		<div class="row">

			<div class="eight columns">
			
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'content' );
				endwhile;
					wi_page_nav();
				?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>