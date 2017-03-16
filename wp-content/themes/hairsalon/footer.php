<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #main-content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

</div><!-- #main-content -->

<footer id="colophon" class="site-footer">
	<?php if (is_active_sidebar('footer_banner') && !is_404()) : ?>
		<?php dynamic_sidebar('footer_banner'); ?>
	<?php endif; ?>
	<?php thim_footer_layout(); ?>
	<?php do_action('thim_after_footer'); ?>
</footer><!-- #colophon.site-footer -->

</div><!-- wrapper-container -->

<?php wp_footer(); ?>

<?php do_action( 'thim_space_body' ); ?>

</body>
</html>
