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
