<?php
global $thim_dashboard;
$theme_data = $thim_dashboard['theme_data'];
?>

<?php do_action( 'before_thim_dashboard_wrapper' ); ?>

<div class="thim-wrapper">
	<header class="tc-header">
		<div class="title">
			<h1 class="name"><?php echo esc_html( $theme_data['name'] . ' Theme Dashboard' ); ?></h1>
			<span class="version"><?php echo esc_html( $theme_data['version'] ); ?></span>
		</div>

		<nav class="nav-tab-wrapper tc-nav-tab-wrapper">
			<?php foreach ( $sub_pages as $key => $sub_page ):
				$prefix = Thim_Dashboard::$prefix_slug;
				$link = admin_url( 'admin.php?page=' . $prefix . $key );
				$title = $sub_page['title'];
				?>
				<a href="<?php echo esc_url( $link ); ?>" class="nav-tab<?php echo ( $key === $page ) ? ' nav-tab-active' : ''; ?>"
				   title="<?php echo esc_attr( $title ); ?>"><?php echo esc_html( $title ); ?></a>
			<?php endforeach; ?>
		</nav>
	</header>

	<div class="notifications">
		<?php do_action( 'thim_dashboard_notifications', $page ); ?>
	</div>

	<div class="tc-main">
		<?php echo $html; ?>
	</div>
</div>

<?php do_action( 'after_thim_dashboard_wrapper' ); ?>
