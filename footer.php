
<footer>

  <div class="foot">
	  
    <div class="foot-information">
      <a href="<?php esc_url(site_url('/')); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="社会福祉法人 七峰会">
      </a>
      <address>
        〒036-8356<br>
        青森県弘前市大字下白銀町21番地8
      </address>
      <p>
        TEL：<a href="tel:0172338861">0172-33-8861</a><br>
        FAX：<a href="tel:0172338862">0172-33-8862</a>
      </p>
    </div>
    <nav>
      <ul>
        <li>
          <a href="<?php echo esc_url(site_url('/')); ?>">
            トップページ
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/strength')); ?>">
            <?php echo get_the_title(get_page_by_path('strength')); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/corporate')); ?>">
            <?php echo get_the_title(get_page_by_path('corporate')); ?>
          </a>
        </li>
      </ul>
      <ul>
        <li>
          <a href="<?php echo esc_url(site_url('/support-disabilities')); ?>">
            <?php echo get_the_title(get_page_by_path('support-disabilities')); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/support-elderly')); ?>">
            <?php echo get_the_title(get_page_by_path('support-elderly')); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/facilities')); ?>">
            <?php echo get_the_title(get_page_by_path('facilities')); ?>
          </a>
        </li>
      </ul>
      <ul>
        <li>
          <a href="<?php echo get_category_link(get_category_by_slug('news')); ?>">
            新着情報
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/contact')); ?>">
            <?php echo get_the_title(get_page_by_path('contact')); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/links')); ?>">
            <?php echo get_the_title(get_page_by_path('links')); ?>
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url(site_url('/privacy-policy')); ?>">
            <?php echo get_the_title(get_page_by_path('privacy-policy')); ?>
          </a>
        </li>
      </ul>
      <ul>
        <li>
          <a href="<?php echo esc_url(site_url('/recruit')); ?>">
            <?php echo get_the_title(get_page_by_path('recruit')); ?>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <small>
    &copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>.
  </small>
</footer>
<span id="pagetop"><a href="#pages"></a></span>

<?php wp_footer(); ?>

<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery-3.4.0.min.js">
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/remodal.js">
</script>
<?php if (is_home()) { ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" crossorigin="anonymous"></script>
<script>window.Swiper || document.write('<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/swiper.min.js"><\/script>')</script>
<?php } ?>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/basic.js">
</script>
<script>
$(function() {
  $(document).tooltip({
    position: {
      my: "left top+5",
      at: "left+10 bottom",
    },
    content: function() {
      return $(this).prop('title');
    }
  });
});
</script>