<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */



get_header();
?>

	<main id="main">

		<?php
			get_template_part( 'template-parts/content/content', 'single-article' );
		?>

	</main>

<?php
get_footer();