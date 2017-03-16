<?php
/**
 * The Sidebar containing the main widget areas.
 *
 */
if ( ! is_active_sidebar( 'sidebar_shop' ) ) {
	return;
}
?>

<div id="sidebar-shop" class="widget-area col-sm-3" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar_shop' ) ) :
		dynamic_sidebar( 'sidebar_shop' );
	endif; ?>
</div><!-- #sidebar-shop -->

