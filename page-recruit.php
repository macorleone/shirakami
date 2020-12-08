<?php global $post; ?>
<?php $post_slug = $post->post_name; ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<?php get_header(); ?>
<?php get_template_part('parts/recruit'); ?>
<section id="workplace">
	<div class="inner">
		<h2>七峰会で叶う<strong>3</strong>つの"K"
			<span>七峰会という職場</span>
		</h2>
		<div class="flex3">
			<div>
				<img src="../../wp-content/uploads/2020/07/3k_01.jpg" alt="七峰会 福利厚生" class="round">
				<h3 class="circle">厚遇</h3>
				<p class="center">
					<strong>働く職員の仕事と暮らしを応援</strong>
				</p>
				<p>
					500人規模の職員を支える七峰会は、安定して長く働ける環境が整っています。福利厚生などの待遇面はもちろん、全世代の職員が揃っているため、人としての多様性が尊重され、互いに認め合い、感謝し合い、成長を感じながら働ける場所です。
				</p>
			</div>
			<div><img src="../../wp-content/uploads/2020/06/3k_02.jpg" alt="七峰会 内部研修・外部研修・資格取得支援" class="round">
				<h3 class="circle">向上</h3>
				<p class="center">
					<strong>キャリアを支援する教育体制</strong>
				</p>
				<p>
					職員数が多いだけでなく、これまで多くの人材とかかわり育ててきた七峰会には、内部研修・外部研修参加・資格取得支援など、それぞれが目指すキャリアに合わせた支援とサポートが充実しています。
				</p>
			</div>
			<div>
				<img src="../../wp-content/uploads/2020/07/3k_03.jpg" alt="七峰会 多岐にわたるサービス" class="round">
				<h3 class="circle">希望</h3>
				<p class="center">
					<strong>実現させたい夢へ向かって</strong>
				</p>
				<p>
					多岐にわたるサービスを展開する七峰会では、サービス間の異動を通じて、自分にフィットしたサービスに出会うことが可能です。あらゆる視点で経験を積み、総合的な福祉のプロフェッショナルとなることで、将来の理事長・総合施設長にもなれる法人です。
				</p>
			</div>
		</div>
		<div class="btn full"><a href="<?php echo esc_url(site_url('/recruit/workplace')); ?>">七峰会という職場</a>
		</div>
	</div>
</section>
<?php get_template_part('parts/section', 'voices'); ?>
<section>
	<div class="inner">
		<h2>募集要項<span>occupation</span></h2>
		<div class="narrow">
			<p>七峰会では人材育成への取り組み・資格取得のサポートなどを行っています。福祉に関心のある方、福祉の職場で働きたい方など、お気軽にお問い合わせください。</p>
		</div>
		<div class="block-links">
			<div>
				<a href="<?php echo esc_url(site_url('/recruit/graduates')); ?>" class="arrow-full">新卒採用</a>
			</div>
			<div>
				<a href="<?php echo esc_url(site_url('/recruit/mid-career')); ?>" class="arrow-full">中途採用</a>
			</div>
		</div>
	</div>
</section>
<section id="entry" class="bg_blue">
	<div class="inner">
		<div class="narrow">
			<h2>七峰会では、福祉の役割や考え方に共感し、<br>安心できる環境づくりに一緒に取り組んで頂ける人材を募集しています。</h2>
			<div class="flex2">
				<div>
					<a href="tel:0172338861"><i class="fas fa-phone-alt"></i>0172-33-8861</a>
					<small>
						営業時間 / 9:00 - 18:00
					</small>
				</div>
				<div>
					<div class="btn white"><a href="/recruit/entry">エントリー</a></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();