<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div class="four columns offset-by-one  page-sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>