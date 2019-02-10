<?php
/*
Plugin Name: KAMINO WP PLUGIN
Plugin URI: https://blog.aikamino.cn/a/1114.html
Description: 一些不明功能
Version: 0.4
Author: kamino
Author URI: https://blog.aikamino.cn
License: GPL2
*/

define( "KAMINO_PLUGIN_ROOT", __DIR__ );

#升级为https请求
header("Content-Security-Policy: upgrade-insecure-requests");

//include_once KAMINO_PLUGIN_ROOT . "/functions/iis-chinese-tag.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/e-secret.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/del-unknown-header.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/kamino-wp-liuyan.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/kamino-wp-noticebar.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/kamino-link-page.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/change-upload-name.php";
include_once KAMINO_PLUGIN_ROOT . "/functions/bilibili-shortcode.php";

/*
 * 注册小工具
 */
function kamino_register_widgets() {
	register_widget( "kamino_wp_noticebar" );
	register_widget( "kamino_wp_liuyan" );
	add_shortcode( 'secret', 'e_secret' );
	add_shortcode( 'bilivideo', 'bilivideo' );
}

add_action( "widgets_init", "kamino_register_widgets" );

/*
 * 注册短代码
 */
function kamino_register_shortcodes() {
	add_shortcode( 'friend', 'kamino_links' );
	add_shortcode( 'sc', 'kamino_links_s' );
}

add_action( 'init', 'kamino_register_shortcodes' );


/*
 * 添加静态文件
 */
function kamino_register_script() {
	wp_register_script( 'kamino-wp-script', plugins_url( '/kamino-wp-plugin/html/kamino_wp_plugin.js', dirname( __FILE__ ) ), "js", "1.2.3" );
	wp_enqueue_script( 'kamino-wp-script' );
	wp_register_script( 'jquery-cookie-script', plugins_url( '/kamino-wp-plugin/html/jquery.cookie.js', dirname( __FILE__ ) ), "js", "1.4.1" );
	wp_enqueue_script( 'jquery-cookie-script' );
	wp_register_style( 'kamino-wp-style', plugins_url( '/kamino-wp-plugin/html/kamino_wp_plugin.css', dirname( __FILE__ ) ), "css", "1.2.1" );
	wp_enqueue_style( 'kamino-wp-style' );
}

add_action( "wp_enqueue_scripts", "kamino_register_script" );
