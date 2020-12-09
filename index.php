<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<!--header--><?php get_template_part('parts/body_header'); ?>
		<main>

<section id="strength" class="bg_image">
	<div class="inner">
		<h2>七峰会の強み</h2>
		<p>あああああああああああああああああああああああああああああああああああああああああああああ</p>




		<div class="btn full"><a href="<?php echo esc_url(site_url('/strength')); ?>">七峰会の強み</a>
		</div>
	</div>
</section>

<section id="news" class="bg_lightgray">
	<div class="inner">
		<h2>新着情報</h2>
		<div class="narrow">
			<?php $news = new WP_Query([
	'category_name' => 'information',
	'posts_per_page' => 4,
]); ?>
			<?php if ($news->have_posts()) { ?>
			<ul>
				<?php while ($news->have_posts()) { ?>
				<?php $news->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><span class="date"><?php the_time('Y.m.d'); ?></span><span class="category"><?php echo get_the_category()[0]->name ?></span><?php the_title(); ?> </a>
				</li>
				<?php } ?>
			</ul>
			<div class="btn full"><a href="<?php echo esc_url(site_url('/category/news')); ?>">新着情報</a>
			</div>
			<?php } else {  ?>
			<p>新着情報がまだありません。</p>
			<?php }?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>


<section id="services" class="bg_beige">
	<div class="inner">
		<h2>事業内容</h2>
		
		<div class="flex2 reverse">
			<div class="hana-bg">
				<h3 class="circle">高齢者支援</h3>
				<p>
					七峰会が目指す高齢者介護は「自立支援介護」です。介護と聞くと老化や病気のため、何もできなくなった方のお世話をする、というイメージを持たれがちですが、当法人では専門スタッフのサポートのもと、自分でできることは自分でしていただくという前向きな支援を実施し、皆さまに自分らしく日常生活を送っていただくための前向きな支援を実施しています。
				</p>
				<div class="btn full"><a href="<?php echo esc_url(site_url('/support-elderly')); ?>">高齢者支援</a>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/services02.jpg" alt="高齢者支援 社会福祉法人・七峰会" class="round">
			</div>
		</div>
		<div class="flex2 reverse">
			<div class="hana-bg">
				<h3 class="circle">高齢者支援</h3>
				<p>
					七峰会が目指す高齢者介護は「自立支援介護」です。介護と聞くと老化や病気のため、何もできなくなった方のお世話をする、というイメージを持たれがちですが、当法人では専門スタッフのサポートのもと、自分でできることは自分でしていただくという前向きな支援を実施し、皆さまに自分らしく日常生活を送っていただくための前向きな支援を実施しています。
				</p>
				<div class="btn full"><a href="<?php echo esc_url(site_url('/support-elderly')); ?>">高齢者支援</a>
				</div>
			</div>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/services02.jpg" alt="高齢者支援 社会福祉法人・七峰会" class="round">
			</div>
		</div>
		
		
	</div>
</section>

<section id="facilities" class="bg_image">
	<div class="inner">
		<h2>七峰会の施設</h2>
		<div class="grid">
			<div class="grid3-1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/facility_map.png" alt="七峰会の施設 施設">
			</div>
			<div class="grid3-2">
				<h3>青森県弘前市をはじめ、黒石市や平川市など<br>
					津軽地域を中心に福祉サービスを提供しております</h3>
				<p>
					七峰会は昭和48年の法人創設以来、ご利用者さま一人ひとりに合わせたサービスの提供とサポートを行い、岩木山を囲む津軽地域を中心に7つのグループで22の施設を運営。現在は1,000名を超えるご利用者さまのニーズに合わせて約100の事業を展開し、一人ひとりをサポートさせていただいております。<br>
					七峰会は皆さまのお近くで寄り添い、地域社会への貢献を目指しています。
				</p>
			</div>
		</div>
	</div>
</section>

<h2 class="eyecatch bg_image">
	求人情報
</h2>
<?php get_template_part('parts/recruit'); ?>
</main>
<?php get_footer(); ?>
</body>
</html>