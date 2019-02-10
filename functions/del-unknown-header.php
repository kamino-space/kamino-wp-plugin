<?php
/**
 * Author: kamino
 * CreateTime: 2018/4/19,下午 04:25
 * Description:
 * Version:
 */

//删除奇怪的东西

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10 );
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
remove_filter( 'oembed_response_data', 'get_oembed_response_data_rich', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
