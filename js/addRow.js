/**
 * Sample.js for addInputArea
 */

// 各サンプルの設定
jQuery(document).ready(function($) {
	$('#list1').addInputArea();
	$('#list2').addInputArea({
		area_var : '.var_area02',
		btn_add	: '.add_button02',
		btn_del	: '.del_button02'
	});
	$('#list3').addInputArea();
	$('#list4').addInputArea({
		area_del : '.del_area04'
	});
	$('#list5').addInputArea({
		maximum : 5
	});
	$('#list6').addInputArea();
	$('#list7').addInputArea();
	$('#list8').addInputArea();
	// セレクトボックスの値の変更で発火するイベント。
	// 追加アイテムに対しても適用するため、".on()"を使う。
	$('#list8').on('change', 'select', function() {
		var input = $(this).parents('li').find('[type="text"]');

		// セレクトボックスの値に応じて、テキストボックスの有効無効を切り替える
		if ($(this).val() == 'disable') $(input).attr('disabled', 'disabled');
		else $(input).removeAttr('disabled');
	});
	// クローン元へのイベントは、プラグイン適用前に設定しておくこと。
	$('#list9_0')
		.focus(function() {
			$(this).next().text('Focus!');
		})
		.blur(function() {
			$(this).next().text('Blur!');
		});
	$('#list9').addInputArea();
	$('#list10').addInputArea({
		after_add: function () {
			alert('Added!');
		}
	});
});

jQuery(document).ready(function($) {
	// ページ内リンクのスクロール
	$('a[href^=#]').click(function() {
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top - 10;
		$('body,html').animate({scrollTop: position}, 200, 'swing');
		history.pushState('', '', $(this)[0].href);
		return false;
	});

	// 英語・日本語切り替え
	$('#language button').click(function(ev) {
		$('*[class*=lang_]').hide();
		$('button[id*=lang_]').removeAttr('disabled');
		$('.' + $(ev.target).attr('id')).show();
		$(ev.target).attr('disabled', 'disabled');
	});
	$('#lang_en').trigger('click');

	// 追尾スクロール (英語・日本語切り替えよりも後にすること)
	$('nav').simpleScrollFollow({
		min_width: 992,
		limit_elem: $('article')
	});
});