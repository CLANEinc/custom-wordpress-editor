<?php
/*
  Plugin Name: custom wordpress editor
  Description: Wordpressのエディタに機能を追加する
  Version: 1.0.1
  Author: Shota Kawakatsu
  Author URI:https://github.com/CLANEinc/custom-wordpress-editor
  License: GPLv2
 */

// ---------- 管理画面のみ ----------
if (is_admin()) {
    // ---------- jsファイル読み込み ----------
    wp_enqueue_script('custom-wordpress-editor', plugins_url('/assets/js/custom-wordpress-editor.js', __FILE__), [], '1.0.0', true);
}

// ---------- 作成したプラグインを登録 ----------
add_filter('mce_external_plugins', function ($plugin_array) {
    $plugin_array['original_tinymce_button_plugin'] = plugins_url('/assets/js/custom-wordpress-editor.js', __FILE__);

    return $plugin_array;
});

// ---------- プラグインで作ったボタンを登録 ----------
add_filter('mce_buttons', function ($buttons) {
    $buttons[] = 'insert_template';

    return $buttons;
});

// ---------- エディタースタイルを読み込ませる ----------
add_action('admin_init', function () {
    add_editor_style(plugins_url('/style.css', __FILE__));
});

// JS・CSSファイルを読み込む
function add_files()
{
    // サイト共通JS
    wp_enqueue_script('front-endscript', plugins_url('/assets/js/front-end.js', __FILE__), ['jquery'], '', true);

    // サイト共通のCSSの読み込み
    wp_enqueue_style('front-end', plugins_url('/assets/css/front-end.css', __FILE__), '', '20160608');
}
add_action('wp_enqueue_scripts', 'add_files');
