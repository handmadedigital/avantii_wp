<?php
/**
 * Header v3 template
 *
 */
?>

<div class="container">
	<div class="row">
		<div class="thim-top-logo col-sm-12">
			<?php if ( is_active_sidebar( 'topbar-left' ) ) : ?>
				<div class="col-sm-3 text-left">
					<ul class="list-inline">
						<?php dynamic_sidebar( 'topbar-left' ); ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="col-sm-6 width-logo sm-logo text-center">
				<?php do_action( 'thim_header_logo' ); ?>
				<?php do_action( 'thim_header_sticky_logo' ); ?>
			</div>

			<?php if ( is_active_sidebar( 'topbar-right' ) ) : ?>
				<div class="col-sm-3 text-right">
					<ul class="list-inline">
						<?php dynamic_sidebar( 'topbar-right' ); ?>
					</ul>
				</div>
			<?php endif; ?>
		</div><!-- .thim-top-logo -->
		<?php
		if ( get_theme_mod( 'show_line_after_topbar', false ) ) { ?>
			<div class="line col-sm-12">
				<hr>
			</div><!-- .line -->
		<?php }
		?>
		<div class="navigation col-sm-12">
			<nav class="width-navigation main-navigation">
				<div class="inner-navigation">
					<?php get_template_part( 'templates/header/main-menu' ); ?>
				</div><!-- .inner-navigation -->
			</nav><!-- .width-navigation -->
			<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</div><!-- .menu-mobile-effect -->
		</div><!-- .navigation -->
	</div><!-- .row -->
</div><!-- .container -->