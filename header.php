<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no, email=no, address=no">
		<?php wp_head(); ?>
		<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>/wp-content/uploads/2020/07/icon.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"  onload="window.fontawesomecss = 1;" crossorigin="anonymous" />-->
		
		<?php if (is_home()) { ?>
		<!--Swiper トップページスライダー-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" crossorigin="anonymous" onload="window.swipermincss = 1;" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css" crossorigin="anonymous" />
		<script>window.swipermincss || document.write('<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/swiper.min.css" \/>');</script>
		<?php } ?>
		
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/remodal.css">
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/page.css?<?php echo filemtime(get_template_directory('/css/page.css')); ?>">
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header>
			<div class="head">

				<div class="head-top">
					<div class="head-subtitle">
						青森県・津軽エリアの福祉トータルサポート
					</div>
					<div class="head-contact">
						<a href="<?php echo get_category_link(get_category_by_slug('news')); ?>" class="arrow">新着情報</a>
						<a href="<?php echo site_url('/contact'); ?>" class="arrow">お問い合わせ</a>
						<a href="tel:0172338861"><i class="fas fa-phone"></i>0172-33-8861</a>
					</div>
				</div>

				<div class="head-main">
					<a href="<?php echo site_url(); ?>" class="head-logo">
						<picture class="swiper-slide">
							<source srcset="<?php echo get_template_directory_uri(); ?>/img/logo-sp.png" media="(max-width: 700px)">
							<img src="<?php echo get_template_directory_uri().'/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>">
						</picture>
						<h1><?php bloginfo('name'); ?></h1>
					</a>
					<nav>
						<ul>
							<?php wp_list_pages(['title_li' => null, 'include' => [
	get_page_by_path('strength')->ID,
	get_page_by_path('corporate')->ID,
	get_page_by_path('support-disabilities')->ID,
	get_page_by_path('support-elderly')->ID,
	get_page_by_path('facilities')->ID,
]]); ?>
							<li><a class="nav-recruit" href="<?php echo site_url('/recruit'); ?>">採用情報</a>
							</li>
						</ul>
					</nav>
				</div>
				
				<!--採用ページ-->
				<?php $recruit_page = get_page_by_path('recruit'); ?>

				<?php if (in_array($recruit_page->ID, [wp_get_post_parent_id(0), get_the_ID()]) || is_category('recruit-news')) { ?>
				<div class="head-recruit">
					<nav>
						<ul>
							<?php wp_list_pages(['title_li' => null, 'include' => $recruit_page->ID]); ?>
							<?php wp_list_pages(['title_li' => null, 'child_of' => $recruit_page->ID, 'sort_column' => 'menu_order', 'exclude' => get_page_by_path('recruit/entry')->ID]); ?>
							<li<?php echo is_category('recruit-news') ? ' class="current_page_item"' : ''; ?>><a
																												 href="<?php echo get_category_link(get_category_by_slug('recruit-news')); ?>">インフォメーション</a>
							</li>
							<?php wp_list_pages(['title_li' => null, 'include' => get_page_by_path('recruit/entry')->ID]); ?>

						</ul>
					</nav>
				</div>
				<?php } ?>
				
				
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
								<li>
									<a href="<?php echo get_category_link(get_category_by_slug('news')); ?>">新着情報</a>
								</li>
								<li>
									<a href="<?php echo esc_url(site_url('/privacy-policy')); ?>">
										<?php echo get_the_title(get_page_by_path('privacy-policy')); ?>
									</a>
								</li>
								<li>
									<a href="<?php echo esc_url(site_url('/recruit')); ?>">
										<?php echo get_the_title(get_page_by_path('recruit')); ?>
									</a>
								</li>
							</ul>
							<div class="btn white">
								<a href="<?php echo esc_url(site_url('/contact')); ?>">
									<?php echo get_the_title(get_page_by_path('contact')); ?>
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>


			<?php if (is_home()) { ?>
			<div class="swiper-container">
				<div class="swiper-wrapper">					
					<picture class="swiper-slide">
						<source srcset="<?php echo get_template_directory_uri(); ?>/img/eye_sp02.jpg" media="(max-width: 700px)">
						<img src="<?php echo get_template_directory_uri(); ?>/img/eye03.jpg" alt="0歳から100歳までともに生きる 七峰会・障がい者支援">
					</picture>        
					<picture class="swiper-slide">
						<source srcset="<?php echo get_template_directory_uri(); ?>/img/eye_sp03.jpg" media="(max-width: 700px)">
						<img src="<?php echo get_template_directory_uri(); ?>/img/eye04.jpg" alt="穏やかに安心して暮らすためのサポート 障がい者支援・高齢者支援 しちほうかい">
					</picture>
					<picture class="swiper-slide">
						<source srcset="<?php echo get_template_directory_uri(); ?>/img/eye_sp01.jpg" media="(max-width: 700px)">
						<img src="<?php echo get_template_directory_uri(); ?>/img/eye.jpg" alt="ができるだけ自立し、日常生活を送れるようサポート 七峰会・高齢者支援">
					</picture>
				</div>
			</div>

			<div class="wave">
				<svg class="pc" viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
					<path d="M-11.57,110.03 C231.65,201.80 395.87,92.27 500.27,137.66 L500.00,150.00 L0.00,150.00 Z"
						  style="stroke: none; fill: #ecf5fc;"></path>
				</svg>
				<svg class="sp" viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
					<path d="M-5.36,126.80 C128.94,110.03 297.11,135.69 509.87,134.70 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #ecf5fc;"></path>
				</svg>
			</div>
			
            <?php } elseif (is_page()) { ?>
			<h1 class="eyecatch bg_image" <?php if (has_post_thumbnail() && !is_page('recruit')) {?>style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?>><?php the_title(); ?></h1>
			<?php } ?>

            
		</header>
		<?php
		if (function_exists('yoast_breadcrumb') && !(is_home() || is_page('recruit'))) {
			yoast_breadcrumb('<div id="breadcrumbs" class="inner">', '</div>');
		}
		?>
		<main>	
		<?php if (!is_home() && !is_page()) {?>
		<div class="inner"><h1><?php is_archive() ? the_archive_title() : the_title(); ?></h1></div>
		<?php }?>
