<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */
?>

<div class="error-404 not-found">
	<div class="page-content">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/404.png' ?>" alt="" />
		<p class="message"> <?php esc_html_e( 'Dude, that page can\'t be found. You better go ', 'hairsalon' ); ?>
			<a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html__( 'Home', 'hairsalon' ); ?></a>
		</p>
	</div><!-- .page-content -->
</div><!-- .error-404 -->
