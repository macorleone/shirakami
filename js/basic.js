//ページ内リンク ヘッダー固定用
$(function () {
	var headerHeight = $(".head").height();
	$('a[href^="#"]')
		.not('a[href^="#modal_menu"]')
		.click(function () {
		var href = $(this).attr("href");
		var target = $(href == "#" || href == "" ? "html" : href);
		var position = target.offset().top - headerHeight;
		$("html, body").animate({ scrollTop: position }, 500, "swing");
		return false;
	});

	var hash = decodeURI(window.location.href.split("#")[1]);
	if (hash) {
		setTimeout(function () {
			var headerHeight = $(".head").height();
			var speed = 0;
			var target = $("#" + hash);
			if (target.length) {
				var position = target.offset().top;

				$("html, body").animate(
					{
						scrollTop: position - headerHeight,
					},
					speed,
					"swing"
				);
			}
		}, 500);
	}

	if ($(".swiper-container").length) {
		new Swiper(".swiper-container", {
			autoHeight: true,
			speed: 400,

			effect: "fade",
			autoplay: true,
		});
	}

	var currentRecruitPage = document.getElementsByClassName("current_page_item");
	if(currentRecruitPage[0]){
		currentRecruitPage[0].scrollIntoView({behavior: "smooth",inline: "center"});
	}

	var topBtn = $("#pagetop");
	topBtn.hide();
	//スクロールが200に達したらボタン表示
	$(window).scroll(function () {
		if ($(this).stop().scrollTop() > 200) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});

	//スクロールしてトップ
	topBtn.click(function () {
		$("body,html").stop().animate(
			{
				scrollTop: 0,
			},
			500
		);
		return false;
	});
});

// 空のpを消す
$("p:empty").remove();
$('img').parents('a[href$=".pdf"], a[target="_blank"]').addClass('noicon')