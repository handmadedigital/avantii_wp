<?php
/**
 * Header v1 template
 *
 */
$display = get_theme_mod( 'header_topbar_display', false );
if ( $display ) {
	get_template_part( 'templates/topbar/topbar_v1' );
}
?>

<?php
if ( get_theme_mod( 'show_line_after_topbar', false ) ) { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 line">
				<hr>
			</div><!-- .line -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php }
?>

<div class="container">
	<div class="row">
		<div class="navigation col-sm-12">
			<div class="tm-table">
				<div class="width-logo table-cell sm-logo">
					<?php do_action( 'thim_header_logo' ); ?>
					<?php do_action( 'thim_header_sticky_logo' ); ?>
				</div><!-- .width-logo -->

				<nav class="width-navigation table-cell table-right main-navigation">
					<div class="inner-navigation">
						<?php get_template_part( 'templates/header/main-menu' ); ?>
					</div>
				</nav><!-- .width-navigation -->

				<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div><!-- .menu-mobile-effect -->
			</div><!-- .tm-table -->
		</div><!-- .navigation -->
	</div><!-- .row -->
</div><!-- .container -->