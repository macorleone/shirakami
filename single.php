<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_header(); ?>

<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		
		<!--header-->
		<?php get_template_part('parts/body_header'); ?>
		<main>

<?php if (!is_home() && !is_page()) {?>
		<div class="inner"><h1><?php is_archive() ? the_archive_title() : the_title(); ?></h1></div>
		<?php }?>

<section>
  <div class="inner">
    <?php while (have_posts()) { ?>
    <?php the_post(); ?>
    <p class="update">
		<a href="/category/news/<?php echo get_the_category()[0]->slug ?>" class="category cat_<?= get_the_category()[0]->slug ?>"><?php echo get_the_category()[0]->name ?></a> - 
      <?php the_time('Y.m.d'); ?>
    </p>
    <?php the_content(); ?>
    <?php the_post_navigation([
            'next_text' => '<span class="navitext">次へ</span><span>%title</span>',
            'prev_text' => '<span class="navitext">前へ</span><span>%title</span>',
            'in_same_term' => true,
        ]); ?>
    <?php } ?>
  </div>
</section>
</main>
<?php get_footer(); ?>
</body>
</html>