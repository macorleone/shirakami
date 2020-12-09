	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no, email=no, address=no">
		<?php wp_head(); ?>
		<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="<?php echo site_url(); ?>/wp-content/uploads/2020/07/icon.png">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"  onload="window.fontawesomecss = 1;" crossorigin="anonymous" />-->
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/sanitize.css">

		<?php if (is_home()) { ?>
		<!--Swiper トップページスライダー-->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" crossorigin="anonymous" onload="window.swipermincss = 1;" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css" crossorigin="anonymous" />
		<script>window.swipermincss || document.write('<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/swiper.min.css" \/>');</script>
		<?php } ?>
		
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/remodal.css">
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/page.css?<?php echo filemtime(get_template_directory('/css/page.css')); ?>">
	</head>
