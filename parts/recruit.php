<div id="recruit-catch" class="bg_blue">
	<div class="inner">

		<div class="narrow">
			<h2>七峰会でみつける、あたらしい自分。</h2>
			<p <?php echo is_home() ? 'class="mb"': '' ?>>
				「誰かの役に立ちたい」「人に喜ばれる仕事がしたい」「自分の力を社会や地域のために活かしたい」。七峰会は、あなたの「やりたい」気持ちをお待ちしております。今はまだ何が向いているか分からなくていい。何ができるか分からなくていい。子供から大人まで多くのサービスを提供している環境だからこそ、あなたの「やりたい」が経験となり、成長へとつながり、新しい自分をみつけるきっかけになります。
			</p>
		</div>
		<?php echo is_home() ? '<div class="btn white"><a href="/recruit/">求人情報</a></div>': '' ?>
	</div>
</div>

<!--
<section id="recruit-news" class="bg_lightblue">
	<div class="inner">

		<h2>求人の新着情報<span>NEWS</span></h2>
		<div class="narrow">
			<?php $recruit_news = new WP_Query([
	'category_name' => 'recruit-news',
	'posts_per_page' => 4,
]); ?>
			<?php if ($recruit_news->have_posts()) { ?>
			<ul>
				<?php while ($recruit_news->have_posts()) { ?>
				<?php $recruit_news->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<span class="date"><?php the_time('Y.m.d'); ?></span>
						<?php the_title(); ?> </a>
				</li>
				<?php } ?>
			</ul>
			<div class="btn full"><a
									 href="<?php echo esc_url(site_url('/category/recruit-news')); ?>">求人情報の新着情報</a>
			</div>
			<?php } else {  ?>
			<p>求人の新着情報がまだありません。</p>
			<?php }?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
-->