<section>
	<div class="inner">
		<h2>きめ細やかで切れ目のない包括的なケアで、<br>津軽地域の広範囲をサポート</h2>  
		<div class="flex2">		
			<div>
				<img src="../../wp-content/uploads/2020/06/facilities.png" alt="津軽地域の広範囲をサポート 七峰会" class="round">
			</div>
			<div>

				<p>
					七峰は、ご利用者さま一人ひとりを末長く支援するために、年齢や身体的状況を問わず、きめ細やかで切れ目のない包括的なケアで、津軽地域の広範囲をサポートしております。</p>
				<p>高齢者や障がい者・障がい児ができるだけ自立した日常生活を送れるよう様々な福祉・介護サービスをご提供しています。<br>
					利用者の皆様が住み慣れた青森県(津軽地域)で安心して暮らせ、地域社会の一員として共に生きていけるよう支援いたします。</p>
				<p>ご利用になりたいサービス、またご利用に適したサービスをお探しの方は、お気軽にお問い合わせください。
				</p>
			</div>
		</div>
	</div>
</section>
<?php require_once __DIR__.'/../facility-data.php'; ?>
<?php if ($facility_data) { ?>
<?php $index = 0; ?>
<?php foreach ($facility_data as $facility_slug => $facility) { ?>
<section <?php echo (0 == $index % 2) ? 'class="bg_beige"' : ''; ?> id="<?php echo $facility_slug; ?>">
	<div class="inner">
		<h2>
			<?php echo $facility['name']; ?><br>
			<small><?php echo $facility['subname']; ?></small>
		</h2>
		<p>
			<strong>サポート内容</strong>
		</p>
		<ul class="support-tags">
			<?php foreach ($facility['tags'] as $tag) { ?>
			<?php $slug = explode('_', $facility['category'])[0]; ?>
			<li>
				<a href="<?php echo site_url($slug); ?>#<?php echo isset($support[$slug][$tag]) ? $tag : ''; ?>" <?php echo isset($support[$slug][$tag]) ? 'title="'.$support[$slug][$tag]['description'].'"'
	: ''; ?>>
					<?php echo $tag; ?>
				</a>
			</li>
			<?php } ?>
		</ul>
		<div class="flex2">
			<div>
				<img src="<?php echo $facility['image']; ?>" alt="<?php echo str_replace('<wbr>', '', $facility['name']); ?>">
			</div>
			<div>
				<p>
					<?php if ($facility['description']) { ?>
					<?php echo $facility['description']; ?>
					<?php } ?>
				</p>
				<table>
					<tr>
						<th>住所</th>
						<td>
							<?php echo $facility['address']; ?><br>
							<a href="<?php echo $facility['maplink']; ?>" target="_blank" class="arrow"
							   rel="noopener noreferrer">地図</a>
						</td>
					</tr>
					<tr>
						<th>TEL</th>
						<td><?php echo $facility['tel']; ?>
						</td>
					</tr>
					<tr>
						<th>FAX</th>
						<td><?php echo $facility['fax']; ?>
						</td>
					</tr>
					<tr>
						<th>ホームページ</th>
						<td>
							<a href="<?php echo $facility['homepage']; ?>" target="_blank">
								<?php echo $facility['name']; ?>
							</a>
						</td>
					</tr>
				</table>
			</div>
			<div class="btn full btn-<?php echo $facility_slug; ?>">
				<a href="<?php echo $facility['homepage']; ?>" target="_blank">公式ホームページへ</a>
			</div>
		</div>
	</div>
</section>
<?php ++$index; ?>
<?php } ?>
<?php } ?>
</section>