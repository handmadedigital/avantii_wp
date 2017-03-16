<?php
/**
 * Footer Template: Default
 *
 */

$class_default = '';

if ( ! thim_footer_has_widgets() ) {
	$class_default = 'no-padding';
}
if ( get_theme_mod( 'copyright_bar', false ) ) {
	$class_default = 'has-copyright-text';
}
?>

	<div class="footer <?php echo esc_attr( $class_default ); ?>">
		<div class="container">
			<div class="row">
				<?php thim_footer_widgets(); ?>
			</div>
		</div>
	</div><!-- .footer -->
<?php if ( get_theme_mod( 'copyright_bar', true ) ) : ?>
	<div class="copyright-area">
		<div class="container">
			<div class="copyright-content">
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php thim_copyright_bar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .copyright-area -->
<?php endif; ?>