<?php $path = is_page('recruit') ? esc_url(site_url('/recruit/voices')) : ''; ?>
<section id="voices" <?php if (is_page('recruit')) { ?>class="bg_lightgray" <?php } ?>>
	<?php if (is_page('recruit')) { ?><h2>先輩の声<span>voices</span></h2><?php } ?>
	<div class="inner">
		<div class="flex3">
			<div>
				<a href="<?php echo $path; ?>#voice01">
					<div class="circle-bg blue">
						<img src="../../wp-content/uploads/2020/06/voice01.jpg" alt="七峰会 先輩の声 介護職員（介護・身体）">
					</div>
				</a>
				<p>
					<em>01</em>
					<small>新卒5年以内</small>介護職員（介護・身体）
					<strong>能登谷恵脩</strong>
				</p>
			</div>
			<div>
				<a href="<?php echo $path; ?>#voice02">
					<div class="circle-bg blue">
						<img src="../../wp-content/uploads/2020/06/voice03.jpg" alt="七峰会 先輩の声 職業指導員（就労）">
					</div>
				</a>
				<p>
					<em>02</em>
					<small>新卒10年以内</small>職業指導員（就労）
					<strong>田中みのり</strong>
				</p>
			</div>
			<div>
				<a href="<?php echo $path; ?>#voice03">
					<div class="circle-bg blue">
						<img src="../../wp-content/uploads/2020/06/voice02.jpg" alt="七峰会 先輩の声 次長">
					</div>
				</a>
				<p>
					<em>03</em>
					<small>勤続20年</small>次長
					<strong>葛西伸也</strong>
				</p>
			</div>
		</div>
		<?php if (is_page('recruit')) { ?>
		<div class="btn full"><a href="<?php echo esc_url(site_url('/recruit/voices')); ?>">先輩の声</a>
		</div>
		<?php } ?>
	</div>
</section>