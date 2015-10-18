<?php

/*
 * Template Name: Portfolio
*/

get_header(); ?>

<div class="page-section">
	<div class="container">
		<section class="portfolio-container">
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
			<?php $style = get_post_meta( $post->ID, 'wi_portfolio_style', true ); ?>
			<?php $cols = get_post_meta( $post->ID, 'wi_portfolio_cols', true ); ?>
			<?php $margin = get_post_meta( $post->ID, 'wi_portfolio_margin', true ); ?>
			<?php $catorg = get_post_meta( $post->ID, 'wi_portfolio_cats', true ); ?>
			<?php $show_cats = get_post_meta( $post->ID, 'wi_portfolio_filter', true ) == 'enable-filters' ? true : false; ?>

			<?php if ( ! empty ( $catorg ) ) {

				if ( sizeof( $catorg ) == 1 ) {
					$show_cats = false;
				}

			} ?>

			<?php if ( $show_cats ) { ?>
				<div class="portfolio-filter text-alt twelve columns">
						<span><a href="#" class="active" value="*"><?php _e( 'All', 'weekendid' ); ?></a></span>
						<?php  $portfolio_categories = get_categories(array('taxonomy'=>'portfolio-category', 'include' => $catorg));

							foreach($portfolio_categories as $portfolio_category) {
								echo '<span><a href="#" value=".' . $portfolio_category->slug . '">' . $portfolio_category->name . '</a></span>';
						} ?>
				</div>
			<?php } ?>

			<?php endwhile; else : endif; ?>

			<div class="clear"></div>

			<?php if ($cols == 'two') {
				$col_text = 'six columns';
			} else if ($cols == 'three') {
				$col_text = 'four columns';
			} else if ($cols == 'four') {
				$col_text = 'three columns';
			} ?>

			<div id="portfolio" class="portfolio-area <?php echo $margin; ?> <?php echo $style; ?>">

				<?php $args = array(
					'post_type' => 'portfolio',
			  	    'orderby'=>'menu_order',
			  	    'order'  => 'ASC',
					'posts_per_page' => '-1',
					'tax_query' => array(
			  	   		array(
			           		'taxonomy' => 'portfolio-category',
			          		'field' => 'id',
			           		'terms' => $catorg,
			           		'operator' => 'IN'
			  	      )
			  	    )
				); ?>

				
				<?php $query = new WP_Query($args); ?>
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

						$id = get_the_ID();
						$image_id = get_post_thumbnail_id();
						$image_link = wp_get_attachment_image_src($image_id,'full');
						$terms = get_the_terms( get_the_ID(), 'portfolio-category' ); 
						$meta = get_the_term_list( $post->ID, 'portfolio-category', '<span>', '</span>, <span>', '</span>' );
						$meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta);


						if ( $style == 'masonry' ) {

							$image = aq_resize( $image_link[0], 767, null, true, false);
							$image_title = esc_attr( get_the_title($id) );

						} else if ( $style == 'grid' ) {
							
							$image = aq_resize( $image_link[0], 767, 500, true, false);
							$image_title = esc_attr( get_the_title($id) );

						} 

					?>

						<div class="portfolio-item item-overlay <?php echo $col_text; ?> <?php foreach ($terms as $term) { echo strtolower($term->slug). ' '; } ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<figure>
				                	<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" />
									<figcaption>
										<a href="<?php the_permalink() ?>" class="overlay">
											<div class="overlay-content">
												<h5 class="portfolio-title item-title text-alt"><span><?php the_title(); ?></span></h5>
												<p><?php echo $meta; ?></p>
											</div>
										</a>				
									</figcaption>
								</figure>
							</article>
						</div>

					<?php endwhile; else : 

						get_template_part( 'content-none' );

					endif;
					?>
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>