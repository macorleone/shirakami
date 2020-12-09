<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!--header-->
	<?php get_template_part('parts/body_header'); ?>
	<main>
		<?php remove_filter('the_content', 'wpautop'); ?>

		<?php the_content(); ?>

	</main>
	<?php get_footer(); ?>
</body>
</html>