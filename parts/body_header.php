<header>
<div class="head">
<div class="head-top">
					<div class="head-subtitle">青森県・津軽エリアの福祉トータルサポート</div>
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
							<li<?php echo is_category('recruit-news') ? ' class="current_page_item"' : ''; ?>><a href="<?php echo get_category_link(get_category_by_slug('recruit-news')); ?>">インフォメーション</a>
							</li>
							<?php wp_list_pages(['title_li' => null, 'include' => get_page_by_path('recruit/entry')->ID]); ?>
						</ul>
					</nav>
				</div>
				<?php } ?>

				<!--スマホナビ-->
				<?php get_template_part('parts/sp_navi'); ?>
			</div>


			<?php if (is_home()) { ?>
			<!--トップスライダー-->
			<?php get_template_part('parts/slider'); ?>
            <?php } elseif (is_page()) { ?>
			<h1 class="eyecatch bg_image" <?php if (has_post_thumbnail() && !is_page('recruit')) {?>style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)" <?php } ?>><?php the_title(); ?></h1>
			<?php } ?>
		</header>

		<?php
		if (function_exists('yoast_breadcrumb') && !(is_home() || is_page('recruit'))) {
			yoast_breadcrumb('<div id="breadcrumbs" class="inner">', '</div>');
		}
		?>