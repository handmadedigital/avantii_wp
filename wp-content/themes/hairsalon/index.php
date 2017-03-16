<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

if ( get_theme_mod( 'archive_post_layout', 'masonry-layout' ) == 'grid_layout' ) {
	$blog_layout = 'grid-layout';
} else {
	$blog_layout = 'masonry-layout';
}

?>

<?php
if ( have_posts() ) :?>
	<div class="row">
		<div class="blog-content <?php echo esc_attr( $blog_layout ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/template-parts/content' );
			endwhile;
			?>
		</div><!-- .blog-content.blog-list -->
	</div><!-- .row -->
	<?php
	thim_paging_nav();
else :
	get_template_part( 'templates/template-parts/content', 'none' );
endif;
