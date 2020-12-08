<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		
		<!--header-->
		<?php get_template_part('parts/body_header'); ?>
		<main>

<?php if (have_posts()) { ?>
<section>
  <div class="inner">
    <?php while (have_posts()) { ?>
    <?php the_post(); ?>
    <article class="grid">
      <div class="grid3-1">
        <a href="<?php the_permalink(); ?>" class="blog-image">
			<?php if (has_post_thumbnail()) { ?>
			<?php the_post_thumbnail('thumbnail'); ?>
			<?php } else { ?>
			<?php echo catch_that_image(); ?>
			<?php } ?>
        </a>
      </div>
      <div class="grid3-2">
        <h2>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
        <p><?php the_time('Y.m.d'); ?> - <a href="/category/news/<?php echo get_the_category()[0]->slug ?>" class="category cat_<?= get_the_category()[0]->slug ?>"><?php echo get_the_category()[0]->name ?></a>
        </p>

        <p><?php if (mb_strlen($post->post_content, 'UTF-8') > 100) { ?>
          <?php $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 100, 'UTF-8')); ?>
          <?php echo $content; ?>
          <?php } else {?>
          <?php echo str_replace('\n', '', strip_tags($post->post_content)); ?>
          <?php } ?>
          <a href="<?php the_permalink(); ?>">
            ... 続きを読む
          </a></p>
      </div>
    </article>
    <?php } ?>
    <?php wp_reset_query(); ?>
    <?php } ?>
    <div class="page-navigation">
      <?php echo paginate_links(); ?>
    </div>
  </div>
</section>
</main>
<?php get_footer(); ?>
</body>
</html>