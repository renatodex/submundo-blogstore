<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( is_single() ) : ?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>

		<div class="post-content"><?php the_content(); ?></div>

		<div class="post-footer">
			<div class="post-share social-icons">
				<?php get_template_part( 'includes/sharebox' ); ?>
			</div>
			<div class="post-tags">
				<?php if( $tags = get_the_tags() ) {
				    foreach( $tags as $tag ) {
				        $sep = ( $tag === end( $tags ) ) ? '' : ' ';
				        echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '" class="button">#' . $tag->name . '</a>' . $sep;
				    }
				} ?>
			</div>
		</div>

	<?php else : ?>

		<?php if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) { ?>
		<div class="post-media">
			<?php 
				$thumb = get_post_thumbnail_id( $post->ID );
				$img_url = wp_get_attachment_url( $thumb, 'full' );
				$img = aq_resize( $img_url, '780', '350', true, false );

				echo '<a href="' . esc_url( get_permalink() ) . '"><img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="' . get_the_title() . '" class="post-feat-img" /></a>';
			?>
		</div>
		<?php } ?>

		<div class="post-header">
			<h4 class="post-title text-alt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		</div>

		<div class="post-meta text-alt"><?php wi_post_meta(); ?></div>

		<div class="post-entry"><?php the_excerpt(); ?></div>

		<div class="post-link text-alt">
			<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read more', 'weekend' ); ?></a>
		</div>

	<?php endif; ?>

</article>