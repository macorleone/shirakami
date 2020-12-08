<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_header(); ?>
<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		
		<!--header-->
		<?php get_template_part('parts/body_header'); ?>
		<main>


<?php remove_filter('the_content', 'wpautop'); ?>

<?php if (is_page('voices')) { ?>
<?php get_template_part('parts/section', 'voices'); ?>
<?php } ?>

<?php the_content(); ?>

<?php if ('' === get_the_content() && file_exists(__DIR__.'/pages/'.$post_slug = $post->post_name.'.php')) { ?>
<?php include 'pages/'.$post_slug = $post->post_name.'.php'; ?>
<?php
																											while (have_posts()) {
																												the_post();
																												the_content();
																											}
?>
<?php } ?>

<?php if (is_page(['support-disabilities', 'support-elderly'])) { ?>
<?php require_once __DIR__.'/facility-data.php'; ?>
<?php global $post; ?>
<?php $slug = $post->post_name; ?>
<section class="bg_green">
	<div class="inner">
		<h3>サポート内容</h3>
		<div class="box_white">
			<?php if ($support[$slug]) { ?>
			<?php foreach ($support[$slug] as $support_name => $support_content) { ?>
			<div class="grid" id="<?php echo $support_name; ?>">
				<div class="grid3-1">
					<img src="<?php echo $support_content['image']; ?>" alt="<?php echo $support_name; ?>">
				</div>
				<div class="grid3-2">
					<h4 class="circle">
						<?php echo $support_name; ?>
					</h4>
					<p>
						<?php echo $support_content['description']; ?>
					</p>

					<?php if (isset($support_content['target']) && $support_content['target']) {?>
					<h5>利用対象</h5>
					<p>
						<?php echo $support_content['target']; ?>
					</p>
					<?php } ?>
					<?php
																				  $supported_facilities = array_filter($facility_data, function ($facility) use ($support_name, $slug) {
																					  return in_array($support_name, $facility['tags']) && (0 === strpos($facility['category'], $slug));
																				  });
					?>
					<?php if ($supported_facilities) {?>
					<h5>対応施設</h5>
					<ul class="supporting_facilities">
						<?php foreach ($supported_facilities as $supportedFacilitySlug => $supportedFacility) {?>
						<li><a href="#<?php echo $supportedFacilitySlug; ?>"
							   class="arrow-down"><?php echo $supportedFacility['name']; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
<section>
	<div class="inner">
		<h2>対応施設一覧</h2>
		<?php foreach ($facility_categories as $facility_category_slug => $facility_category) { ?>
		<?php if (0 === strpos($facility_category_slug, $slug)) { ?>
		<?php
	$supporting_facility_data = array_filter($facility_data, function ($facility) use ($facility_category_slug) {
		return $facility_category_slug == $facility['category'];
	});
		?>
		<?php if ($supporting_facility_data) { ?>
		<h3 class="align-left circle" id="<?php echo $facility_slug; ?>">
			<?php echo $facility_category; ?>
		</h3>
		<div class="flex2">
			<?php foreach ($supporting_facility_data as $facility_slug => $facility) { ?>
			<div class="facility-card" id="<?php echo $facility_slug; ?>">
				<h4 class="border-<?php echo $facility_slug; ?>">
					<?php echo $facility['name']; ?>
				</h4>
				<address>
					<i class="fas fa-map-marker-alt"></i> <?php echo $facility['address']; ?>
				</address>
				<img src="<?php echo $facility['image']; ?>" alt="<?php echo $facility['name']; ?>" class="round">
				<h5>サポート内容</h5>
				<ul class="support-tags">
					<?php foreach ($facility['tags'] as $tag) { ?>
					<li>
						<a <?php echo isset($support[$slug][$tag]) ? 'href="#'.$tag.'"' : ''; ?> <?php echo isset($support[$slug][$tag]) ? 'title="'.$support[$slug][$tag]['description'].'"'
			: ''; ?>>
							<?php echo $tag; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<div class="btn full btn-<?php echo $facility_slug; ?>">
					<a href="<?php echo site_url('/facilities').'#'.$facility_slug; ?>">施設詳細</a>
				</div>
				<div class="btn btn-<?php echo $facility_slug; ?>">
					<a href="<?php echo $facility['homepage']; ?>" target="_blank">公式ホームページへ</a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php } ?>
		<?php } ?>
	</div>
</section>
<?php } ?>
<?php $related_meta = get_post_meta(get_the_ID(), 'related'); ?>
<?php if ($related_meta) { ?>
<?php $related_meta_stripped = str_replace(' ', '', $related_meta[0]); ?>
<?php $related_pages = explode(',', $related_meta_stripped); ?>
<aside>
	<div class="inner">
		<h2>関連情報</h2>
		<div class="inner">
			<div class="flex3">
				<?php foreach ($related_pages as $related_page) { ?>
				<?php if(get_page_by_path($related_page)) { ?>
				<a class="related-page<?php echo explode('/',$related_page)[0] === 'recruit' ? ' rec' : ''?>" href="<?php echo site_url('/'.$related_page); ?>">
					<div class="related-page-image">
						<img
							 src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_page_by_path($related_page)->ID) : ''; ?>"
							 alt="<?php echo get_the_title(get_page_by_path($related_page)->ID) ?>">
					</div>
					<div class="related-page-text">
						<?php echo get_the_title(get_page_by_path($related_page)->ID); ?>
					</div>
				</a>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</aside>
<?php } ?>
</main>
<?php get_footer(); ?>
</body>
</html>