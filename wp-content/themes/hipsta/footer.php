			</main> <!-- end-main-site -->

			<div class="clearfix"></div>

			<footer class="footer">
				<div class="container">
					<div class="twelve columns">

						<div class="copyright">
							<p class="footer-logo-text"><?php bloginfo( 'name' ); ?></p>
							<?php echo do_shortcode( get_option( 'wi_footer_copy', '&copy; Copyright ' . date( 'Y ' ) . get_bloginfo( 'name' ) ) ); ?>
						</div> <!-- end-copyright -->

						<?php wi_social_icons(); ?>

					</div>
				</div>

				<div class="back-to-top">
					<a href="#"><?php echo wi_svg( 'back_to_top' ); ?></a>
				</div> <!-- end-back-to-top -->

			</footer> <!-- end-footer -->
		</div>
		<?php wp_footer(); ?>
	</body>
</html>