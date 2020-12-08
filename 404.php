<?php get_header(); ?>
<h1>お探しのページが見つかりません。（404）</h1>
<section id="<?php echo $post_slug; ?>-top">
  <div class="inner">
    <p class="center mb">
      お探しのページが見つかりません。下記からお選びください。
    </p>
    <div class="narrow">
      <ul class="sitemap-list">
        <?php $pages = get_pages(['sort_column' => 'menu_order', 'parent' => 0]); ?>
        <?php foreach ($pages as $page) { ?>
        <li>
          <a href="<?php the_permalink($page); ?>"><?php echo get_the_title($page); ?></a>
          <?php $children = get_pages(['child_of' => $page->ID]); ?>
          <?php if ($children) { ?>
          <ul>
            <?php foreach ($children as $child) { ?>
            <li>
              <a href="<?php the_permalink($child); ?>" class="arrow"><?php echo get_the_title($child); ?></a>
            </li>
            <?php } ?>
          </ul>
          <?php } ?>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</section>
<?php get_footer();