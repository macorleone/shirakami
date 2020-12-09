<div id="sprecruit"><a href="<?php echo site_url('/recruit'); ?>">採用情報</a></div>
<div id="sptel"><a href="tel:0172338861"><i class="fas fa-phone-alt"></i>お電話</a></div>
<div id="spnav">
	<a href="#modal_menu"><i class="fas fa-bars"></i>メニュー</a>
	<nav class="remodal" data-remodal-id="modal_menu">
		<div>
			<button data-remodal-action="close" class="remodal-close" aria-label="Close"><i class="fas fa-times"></i></button>
			<a href="<?php esc_url(site_url('/')); ?>" class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="logo">
			</a>
			<ul>
				<li><a href="<?php echo esc_url(site_url('/strength')); ?>"><?php echo get_the_title(get_page_by_path('strength')); ?></a></li>
				<li><a href="<?php echo esc_url(site_url('/corporate')); ?>"><?php echo get_the_title(get_page_by_path('corporate')); ?></a></li>
				<li><a href="<?php echo esc_url(site_url('/support-disabilities')); ?>"><?php echo get_the_title(get_page_by_path('support-disabilities')); ?></a></li>
				<li><a href="<?php echo esc_url(site_url('/support-elderly')); ?>"><?php echo get_the_title(get_page_by_path('support-elderly')); ?></a></li>
				<li><a href="<?php echo esc_url(site_url('/facilities')); ?>"><?php echo get_the_title(get_page_by_path('facilities')); ?></a></li>
				<li><a href="<?php echo get_category_link(get_category_by_slug('news')); ?>">新着情報</a></li>
				<li><a href="<?php echo esc_url(site_url('/privacy-policy')); ?>"><?php echo get_the_title(get_page_by_path('privacy-policy')); ?></a></li>
				<li><a href="<?php echo esc_url(site_url('/recruit')); ?>"><?php echo get_the_title(get_page_by_path('recruit')); ?></a></li>
			</ul>
			<div class="btn white">
				<a href="<?php echo esc_url(site_url('/contact')); ?>"><?php echo get_the_title(get_page_by_path('contact')); ?></a>
			</div>
		</div>
	</nav>
</div>