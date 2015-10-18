<?php

/*
 * 404 Page Template
*/

get_header("404"); ?>
	
	<div class="page-section text-center">
		<div class="error-404">
			<i class="error-icon icon icon-caution animated fadeInDown"></i>
			<h3 class="error-title text-alt animated fadeInDown"><?php _e( "Oops!", "weekend" ); ?></h3>
			<h5 class="error-subtitle text-alt animated fadeInDown"><?php _e( "The page you are looking for does not exist.", "weekend" ); ?></h5>
			<a href="<?php echo home_url(); ?>" target="_self" class="button animated fadeInUp"><i class="fa fa-angle-left"></i><?php _e("Back to Home", "weekend") ?></a>
		</div>
	</div>

<?php get_footer("404"); ?>