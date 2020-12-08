<?php get_header(); ?>
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

<?php get_footer();