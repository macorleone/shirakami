<?php

function shichihoukai_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'shichihoukai_setup');

function shichihoukai_scripts()
{
	wp_enqueue_style('shichihoukai-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'shichihoukai_scripts');

// 追加
// wp_head() のいらないものを削除

// WordPressのバージョン情報を削除
remove_action('wp_head', 'wp_generator');
//emoji scriptとcss消す
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
add_filter('emoji_svg_url', '__return_false');
// リンク情報「EditURI」を削除
remove_action('wp_head', 'rsd_link');
// リンク情報「wlwmanifest」を削除
remove_action('wp_head', 'wlwmanifest_link');
// リンク情報「prev」「next」を削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// ショートリンクを削除
remove_action('wp_head', 'wp_shortlink_wp_head');
//oEmbed関連を削除
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// フィード出力を削除
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
add_action('wp_head', function () {
	printf('<link rel="alternate" type="application/rss+xml" title="%s" href="%s">%s', get_bloginfo('name'), get_bloginfo('rss2_url'), "\n");
});

//レンダリングブロックしているJavascriptの読み込みを遅らせる
function move_scripts_head_to_footer_ex()
{
	//ヘッダーのスクリプトを取り除く
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	//フッターにスクリプトを移動する
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
}
add_action('wp_enqueue_scripts', 'move_scripts_head_to_footer_ex');

//プラグインcss削除
function dequeue_plugins_style()
{
	//Gutenberg用css削除
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

function remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
}
add_action('widgets_init', 'remove_recent_comments_style');

// スラッグが「contact」以外のページからCF7のスクリプトを削除する
add_action('wp_enqueue_scripts', 'deregister_cf7_files');
function deregister_cf7_files()
{
	if (!is_page(array('contact', 'entry'))) {
		wp_dequeue_style('contact-form-7');
		wp_dequeue_script('contact-form-7');
	}
}

/**
 * body_class()にページスラッグを追加する.
 *
 * @param mixed $classes
 */
function pagename_class($classes = '')
{
	if (is_page()) {
		$page = get_post(get_the_ID());
		$classes[] = $page->post_name;
		if ($page->post_parent) {
			$classes[] = get_page_uri($page->post_parent).'-child';
		}
	}

	return $classes;
}
add_filter('body_class', 'pagename_class');

/**
 * body_class()にカテゴリスラッグを追加する.
 *
 * @param mixed $classes
 */
function add_category_slug_classes_to_body_classes($classes)
{
	global $post;
	if (is_single()) {
		foreach ((get_the_category($post->ID)) as $category) {
			$classes[] = $category->category_nicename;
		}
	}

	return $classes;
}
add_filter('body_class', 'add_category_slug_classes_to_body_classes');

/**
 * 記事内の画像1枚目をアイキャッチとして取得.
 *
 * @param mixed $url
 */
//画像URLからIDを取得
function get_attachment_id_by_url($url)
{
	global $wpdb;
	$sql = "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s";
	preg_match('/([^\/]+?)(-e\d+)?(-\d+x\d+)?(\.\w+)?$/', $url, $matches);
	$post_name = $matches[1];

	return (int) $wpdb->get_var($wpdb->prepare($sql, $post_name));
}
//画像をサムネイルで出力
function catch_that_image()
{
	global $post;
	$first_img = '';
	$output = preg_match_all("/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/i", $post->post_content, $matches);
	if (isset($matches[1][0])) {
		$first_img_src = $matches[1][0];
		$attachment_id = get_attachment_id_by_url($first_img_src);
		if(0 != $attachment_id){
			$first_img = wp_get_attachment_image($attachment_id, 'thumbnail', false, array('class' => 'archive-thumbnail'));
		} else {
			$first_img = '<img src="'.$first_img_src. '">';
		}

		if (empty($first_img)) {
			if($first_img_src){
				$first_img = '<img src="'.$first_img_src. '">';
			} else{
				$first_img = '<img class="attachment_post_thumbnail" src="' . get_template_directory_uri() . '/img/noimg.jpg" alt="" />';
			}
		}
		return $first_img;
	} else {
		return '<img class="attachment_post_thumbnail" src="' . get_template_directory_uri() . '/img/noimg.jpg" alt="" />';
	}
}

// archive タイトル調整 :カテゴリー :タグ 削除
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	}

	return $title;
});

/**
 * login画面.
 */
function custom_login_logo() { ?>
<style>
	.login-action-login {
		background-color: #fff;
	}

	.login-action-login #login h1 a {
		width: 260px;
		height: 100px;
		margin-bottom: 0;
		background: url('<?php echo esc_url(get_template_directory_uri()); ?>/img/logo.png') no-repeat 0 0;
		background-size: 260px;
	}

	.login-action-login #login h1 a:hover {
		opacity: 0.7;
	}
</style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url()
{
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');

function my_remove_admin_menus()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'my_remove_admin_menus');

function remove_comment_support()
{
	remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');
}
add_action('init', 'remove_comment_support', 100);

function mytheme_admin_bar_render()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');

require __DIR__.'/facility-data.php';

function organization_svg($atts)
{
	require __DIR__.'/facility-data.php';
	return '<svg style="max-height:60vw; height: 50rem; width: 100%"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1076.43 917.2">
    <defs>
        <style>
            .cls-1{fill:none;stroke:#ccc;stroke-miterlimit:10;stroke-width:2.17px}.cls-31{fill:#4f4f4f}.cls-25,.cls-27{fill:#fff}.cls-10,.cls-11{letter-spacing:.02em}.cls-12{fill:#dbdcdc}.cls-17{letter-spacing:.01em}.cls-19{letter-spacing:.03em}.cls-26{fill:#db5f42}.cls-27{font-size:19.5px;font-family:NotoSansCJKjp-Black-90ms-RKSJ-H,Noto Sans CJK JP;letter-spacing:.03em}.cls-31,.cls-34{font-size:16.25px;font-family:NotoSansCJKjp-Medium-90ms-RKSJ-H,Noto Sans CJK JP}.cls-31{letter-spacing:-.02em}.cls-32{fill:#f0a6ad}.cls-33{fill:#b388c9}.cls-34{fill:#484545}.cls-36{fill:#a0c8d5}.cls-37{fill:#e4c100}.cls-38{fill:#5f96cf}.cls-39{fill:#e09646}
        </style>
    </defs>
    <g id="レイヤー_1" data-name="レイヤー 1">
        <line class="cls-1" x1="540.63" y1="862.21" x2="581.81" y2="862.21"/>
        <line class="cls-1" x1="115.5" y1="322.37" x2="116.58" y2="645.54"/>
        <line class="cls-1" x1="116.11" y1="459.16" x2="581.81" y2="459.16"/>
        <line class="cls-1" x1="540.63" y1="56.07" x2="540.63" y2="863.3"/>
        <line class="cls-1" x1="540.63" y1="56.07" x2="581.81" y2="56.07"/>
        <line class="cls-1" x1="540.63" y1="190.43" x2="581.81" y2="190.43"/>
        <line class="cls-1" x1="540.63" y1="324.79" x2="581.81" y2="324.79"/>
        <line class="cls-1" x1="540.63" y1="593.5" x2="581.81" y2="593.5"/>
        <line class="cls-1" x1="540.63" y1="727.86" x2="581.81" y2="727.86"/>
        <rect y="712.3" width="232.14" height="86.68" style="fill:#4f4f4f"/>
        <text transform="translate(16.45 764.47)" style="letter-spacing:.04em;fill:#fff;font-size:21.67px;font-family:NotoSansCJKjp-Bold-90ms-RKSJ-H,Noto Sans CJK JP">
            苦情解決第三者委員
            </text>
        <rect class="cls-12" y="244.94" width="231.43" height="86.68"/>
        <text transform="translate(71.34 298.54)" style="letter-spacing:.03em;font-size:21.67px;font-family:NotoSansCJKjp-Bold-90ms-RKSJ-H,Noto Sans CJK JP;fill:#4f4f4f">
            評議員会
        </text>
        <rect class="cls-12" y="416.79" width="231.43" height="86.04"/>
        <text transform="translate(83.2 471.11)" style="letter-spacing:.03em;font-size:21.67px;font-family:NotoSansCJKjp-Bold-90ms-RKSJ-H,Noto Sans CJK JP;fill:#4f4f4f">
            理事会
        </text>
        <rect class="cls-12" x="0.71" y="586.67" width="231.43" height="86.68"/>
        <text transform="translate(83.28 641.27)" style="letter-spacing:.02em;font-size:21.67px;font-family:NotoSansCJKjp-Bold-90ms-RKSJ-H,Noto Sans CJK JP;fill:#4f4f4f">
            監事会
        </text>
        <rect class="cls-12" x="268.03" y="416.16" width="231.43" height="86.04"/>
        <text transform="translate(305.85 472.31)" style="letter-spacing:.05em;font-size:21.67px;font-family:NotoSansCJKjp-Bold-90ms-RKSJ-H,Noto Sans CJK JP;fill:#4f4f4f">
            法人本部事務局
        </text>
<a target="_blank" href="'.$facility_data['sunapple']['homepage'].'">
        <rect class="cls-25" x="583.43" y="537.97" width="491.38" height="107.81"/>
        <path class="cls-26" d="M1073.18,539.59V644.15H585.06V539.59h488.12m3.25-3.25H581.81V647.4h494.62V536.34Z" transform="translate(0 0)"/>
        <rect class="cls-26" x="583.43" y="536.88" width="492.46" height="35.76"/>
        <path class="cls-26" d="M1075.35,537.43V572.1H584V537.43h491.38m1.08-1.09H582.89v36.84h493.54V536.34Z" transform="translate(0 0)"/>
		<text class="cls-27" transform="translate(603.43 561.84)">サンアップルホームグループ</tspan>
        </text>
        <text transform="translate(603.43 599.66)" style="font-size:16.25px;font-family:NotoSansCJKjp-Medium-90ms-RKSJ-H,Noto Sans CJK JP;fill:#4f4f4f">
            特別養護老人ホーム サンアップルホーム
        </text>
        <text class="cls-31" transform="translate(603.43 622.85)">
            住宅型有料老人ホームわかば
        </text>
        <text class="cls-31" transform="translate(814.95 622.85)">
            デイサービスセンターわかば など
        </text>
        </a>
<a target="_blank" href="'.$facility_data['takushinkan']['homepage'].'">
        <rect class="cls-25" x="583.43" y="135.98" width="491.38" height="107.81"/>
        <path class="cls-32" d="M1073.18,137.61V242.17H585.06V137.61h488.12m3.25-3.25H581.81V245.42h494.62V134.36Z" transform="translate(0 0)"/>
        <rect class="cls-32" x="583.43" y="134.63" width="492.46" height="35.76"/>
        <path class="cls-32" d="M1075.35,135.17v34.67H584V135.17h491.38m1.08-1.08H582.89v36.84h493.54V134.09Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 159.85)">
            '.$facility_data['takushinkan']['name'].'
        </text>
        <text class="cls-31" transform="translate(603.7 197.77)">
            津軽生活支援センター
        </text>
        <text class="cls-31" transform="translate(603.7 221.09)">
            七峰会総合福祉相談支援センター ビリーブ など
        </text>
        <text class="cls-31" transform="translate(774.9 197.77)">
            就労訓練施設 勇心学園
        </text>
        </a>
<a target="_blank" href="'.$facility_data['takkouen']['homepage'].'">
        <rect class="cls-25" x="583.43" y="2.17" width="491.38" height="107.81"/>
        <path class="cls-33" d="M1073.18,3.79V108.35H585.06V3.79h488.12m3.25-3.25H581.81V111.6h494.62V.54Z" transform="translate(0 0)"/>
        <rect class="cls-33" x="583.43" y="0.54" width="492.46" height="35.76"/>
        <path class="cls-33" d="M1075.35,1.08V35.76H584V1.08h491.38M1076.43,0H582.89V36.84h493.54V0Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 26.04)">
            '.$facility_data['takkouen']['name'].'
        </text>
        <text class="cls-34" transform="translate(603.82 65.71)">
            障害者支援施設拓光園
        </text>
        <text transform="translate(775.06 65.71) scale(0.95 1)" style="letter-spacing:-.02em;fill:#484545;font-size:16.25px;font-family:NotoSansCJKjp-Medium-90ms-RKSJ-H,Noto Sans CJK JP">
            拓光園障害児デイサービスセンター
        </text>
        <text class="cls-34" transform="translate(603.82 88.18)">
            拓光園日中一時支援事業所 など
        </text>
</a>
<a target="_blank" href="'.$facility_data['sangoukan-hirosaki']['homepage'].'">
        <rect class="cls-25" x="583.43" y="270.61" width="491.38" height="107.81"/>
        <path class="cls-36" d="M1073.18,272.23V376.79H585.06V272.23h488.12m3.25-3.25H581.81V380.05h494.62V269Z" transform="translate(0 0)"/>
        <rect class="cls-36" x="584.52" y="269.8" width="490.29" height="33.59"/>
        <path class="cls-36" d="M1073.18,271.42v30.34h-487V271.42h487m3.25-3.25H582.89V305h493.54V268.17Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 294.48)">
            山郷館弘前グループ
        </text>
        <text class="cls-31" transform="translate(603.22 332.44)">
            障害者支援施設山郷館
        </text>
        <text class="cls-31" transform="translate(603.22 353.92)">
            山郷館身体障害者短期入所事業所 など
        </text>
        <text class="cls-31" transform="translate(775.54 332.44)">
            山郷館デイサービスセンター
        </text>
</a>
<a target="_blank" href="'.$facility_data['kyokkouen']['homepage'].'">
        <rect class="cls-25" x="583.43" y="404.97" width="491.38" height="107.81"/>
        <path class="cls-37" d="M1073.18,406.59V511.15H585.06V406.59h488.12m3.25-3.25H581.81V514.4h494.62V403.34Z" transform="translate(0 0)"/>
        <rect class="cls-37" x="582.35" y="402.8" width="493.54" height="35.75"/>
        <path class="cls-37" d="M1075.35,403.34V438H582.89V403.34h492.46m1.08-1.08H581.81V439.1h494.62V402.26Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 428.84)">'.$facility_data['kyokkouen']['name'].'</text>
        <text class="cls-31" transform="translate(604.31 466.12)">
            障害者支援施設旭光園
        </text>
        <text class="cls-31" transform="translate(604.31 489.07)">
            旭光園身体障害者短期入所事業所 など
        </text>
        </a>
<a target="_blank" href="'.$facility_data['sangoukan-kuroishi']['homepage'].'">
        <rect class="cls-25" x="583.43" y="673.41" width="491.38" height="107.81"/>
        <path class="cls-38" d="M1073.18,675V779.59H585.06V675h488.12m3.25-3.25H581.81V782.84h494.62V671.78Z" transform="translate(0 0)"/>
        <rect class="cls-38" x="582.35" y="670.97" width="493.54" height="35.76"/>
        <path class="cls-38" d="M1075.35,671.51v34.68H582.89V671.51h492.46m1.08-1.08H581.81v36.84h494.62V670.43Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 697.28)">
            山郷館黒石グループ
        </text>
        <text class="cls-31" transform="translate(605.53 735.62)">
            障害者支援施設山郷館くろいし
        </text>
        <text class="cls-31" transform="translate(605.53 758.46)">
            山郷館パレット など
        </text>
        <text class="cls-31" transform="translate(835.89 735.62)">
            山郷館総合支援センター黒石
        </text>
        </a>
<a target="_blank" href="'.$facility_data['aobamomiji-aoba']['homepage'].'">
        <rect class="cls-25" x="583.43" y="807.76" width="491.38" height="107.81"/>
        <path class="cls-39" d="M1073.18,809.39V914H585.06V809.39h488.12m3.25-3.25H581.81V917.2h494.62V806.14Z" transform="translate(0 0)"/>
        <rect class="cls-39" x="582.35" y="805.06" width="493.54" height="35.76"/>
        <path class="cls-39" d="M1075.35,805.6v34.67H582.89V805.6h492.46m1.08-1.09H581.81v36.84h494.62V804.51Z" transform="translate(0 0)"/>
        <text class="cls-27" transform="translate(603.43 831.64)">
            青葉もみじグループ
        </text>
        <text class="cls-31" transform="translate(605.11 869.8)">
            障害者支援施設青葉寮
        </text>
        <text class="cls-31" transform="translate(605.11 892.99)">
            障害児入所施設もみじ学園
        </text>
</a>

    </g>
</svg>
';
}
add_shortcode('organization_svg', 'organization_svg');

function facility_overview($atts)
{
	require __DIR__.'/facility-data.php';
	$overview = '<table>';

	if ($facility_data) {
		foreach ($facility_data as $facility) {
			$overview .= '<tr>';
			$overview .= '<th>';
			$overview .= '<a href="'.$facility['homepage'].'" target="_blank">'.$facility['name'].'
</a><br>';
			$overview .= '<small>'.$facility['subname'].'</small><br>';
			$overview .= '</th>';
			$overview .= '<td>';
			$overview .= '<i class="fas fa-map-marker-alt"></i>'.$facility['address'].'<br>';
			$overview .= '<a href="'.$facility['maplink'].'" target="_blank" class="arrow" rel="noopener noreferrer">地図</a>';
			$overview .= '</td>';
			$overview .= '<td>TEL: '.$facility['tel'].'<br>FAX: '.$facility['fax'].'<br>';
			$overview .= '</td>';
			$overview .= '</tr>';
		}
	}
	$overview .= '</table>';

	return $overview;
}
add_shortcode('facility_overview', 'facility_overview');

function facility_links($atts)
{
	require __DIR__.'/facility-data.php';
	$links = '<ul class="links">';

	if ($facility_data) {
		foreach ($facility_data as $facility_slug => $facility) {
			$links .= '<li>';
			$links .= '<a href="'.$facility['homepage'].'" target="_blank" class="arrow-full color-'.$facility_slug.' bg-light-'.$facility_slug.' before-'.$facility_slug.'">'.$facility['name'].'
</a>';
			$links .= '</li>';
		}
	}
	$links .= '</ul>';

	return $links;
}
add_shortcode('facility_links', 'facility_links');