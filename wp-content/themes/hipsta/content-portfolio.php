<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

		<div class="twelve columns">
			<div class="portfolio-image">
				<?php $gallery = get_post_meta($post->ID, 'wi_portfolio_gallery', true); ?>
				<?php $video = get_post_meta($post->ID, 'wi_portfolio_video', true); ?>

				<?php $attachments = get_post_meta($post->ID, 'wi_portfolio_gallery', true); ?>
				<?php $attachment_array = explode(',', $attachments); ?>

				<?php if ($gallery) { ?>

				 	<div class="carousel-container bottom-pagination">
						<div class="carousel owl" data-columns="1" data-navigation="true" data-pagination="false">
							<?php
								foreach ($attachment_array as $attachment) {
									$image_link = wp_get_attachment_image_src($attachment,'full');
									$image_title = esc_attr( get_the_title($post->ID) );
									$image_src = aq_resize( $image_link[0], 980, 450, true, false, true);
									
									?>
									<figure class="wp-caption">
										<img  src="<?php echo $image_src[0]; ?>" width="<?php echo $image_src[1]; ?>" height="<?php echo $image_src[2]; ?>" />
									</figure>
									<?php
								}
							?>
						</div>
					</div>

				<?php } elseif ($video) { ?>
					<div id="portfolio-video"><?php echo $video; ?></div>
				<?php } else { ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php } ?>
			</div>
		</div>

		<div class="eight columns">
			<h4 class="text-alt"><?php _e( 'Portfolio Description', 'weekend' ); ?></h4>
			<div class="post-content"><?php the_content(); ?></div>
		</div>

		<div class="four columns">
			<div class="portfolio-details">
				<?php $attributes = get_post_meta($post->ID, 'wi_portfolio_attributes', true); ?>
				<?php $link = get_post_meta($post->ID, 'wi_portfolio_link', true); ?>
				<?php $target = get_post_meta($post->ID, 'wi_portfolio_link_target', true); ?>
				<?php $meta = get_the_term_list( $post->ID, 'portfolio-category', '<span>', '</span>, <span>', '</span>' ); ?>
				<?php $meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta); ?>

					<h4 class="text-alt"><?php _e( 'Portfolio Details', 'weekend' ); ?></h4>
					<?php if($attributes) { ?>
					<div class="portfolio-meta">
						<?php foreach($attributes as $attribute) { ?>
							<div>
								<label class="list-label text-alt"><?php echo $attribute['title']; ?></label>
								<?php echo $attribute['wi_attribute_value']; ?>
							</div>
						<?php } ?>
							<div>
								<label class="list-label text-alt"><?php _e( 'Category', 'weekend' ); ?></label>
								<?php echo $meta; ?>
							</div>
							<div class="portfolio-share">
								<label class="list-label text-alt"><?php _e( 'Share', 'weekend' ); ?></label>
								<?php get_template_part( 'includes/sharebox' ); ?>
							</div>
							<?php } ?>
							<?php if($link) { ?>
							<div class="portfolio-meta">
								<a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="button"><?php _e( 'Visit Project', 'weekend' ); ?></a>
							</div>
							<?php } ?>
			</div>
		</div>

	<?php else : ?>

		<div class="project-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>

	<?php endif; ?>	

</article>