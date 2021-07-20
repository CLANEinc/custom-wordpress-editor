<?php
/*
  Plugin Name: custom wordpress editor
  Description: Wordpressのエディタに機能を追加する
  Version: 1.0.0
  Author: Shota Kawakatsu
 */

require_once 'scssphp.php';


 if (is_admin()) {
     ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo plugins_url('/assets/js/custom-wordpress-editor.js', __FILE__); ?>"></script>

<?php


// 作成したプラグインを登録
add_filter('mce_external_plugins', function ($plugin_array) {
    $plugin_array['original_tinymce_button_plugin'] = plugins_url('/assets/js/custom-wordpress-editor.js', __FILE__);

    return $plugin_array;
});
// プラグインで作ったボタンを登録
add_filter('mce_buttons', function ($buttons) {
    $buttons[] = 'insert_template';

    return $buttons;
});

 }

// ---------- エディタースタイルを読み込ませる ----------
add_action('admin_init', function () {
add_editor_style(plugins_url('/style.css', __FILE__));
});


// ---------- the_contentをフックにしてjsファイルを読み込ませる ----------


// ---------- the_contentをフックにしてjsファイルを読み込ませる ----------
add_filter('the_content', function () { ?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/assets/css/front-end.css', __FILE__); ?>">
<?php
});

// ---------- the_contentをフックにしてjsファイルを読み込ませる ----------
add_filter('the_content', function () { ?>

<script src="<?php echo plugins_url('/assets/js/front-end.js', __FILE__); ?>"></script>
<?php
});
