(function () {
	tinymce.create('tinymce.plugins.original_tinymce_button', {
		init: function (ed, url) {
			ed.addButton('insert_template', {
				// text : ボタンの表示名
				text: 'テンプレートの挿入',
				// type: 'menubutton'にすると、プルダウンのようなメニューボタンを作成することができます。
				type: 'menubutton',
				menu: [
					{
						text: 'アコーディオン',
						onclick: function () {
							ed.insertContent(
								'<div class="accordion__head">ここにアコーディオンのタイトルが入ります</div><div class="accordion__body">ここにアコーディオンのコンテンツが入ります</div>'
							);
						},
					},
				],
			});
		},
		createControl: function (n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('original_tinymce_button_plugin', tinymce.plugins.original_tinymce_button);
})();
