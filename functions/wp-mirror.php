<?php
add_filter('site_transient_update_core', function($value){
	foreach ($value->updates as &$update) {
		if($update->locale == 'zh_CN'){
			$update->download	= 'http://cn.wp101.net/latest-zh_CN.zip';
			$update->packages->full	= 'http://cn.wp101.net/latest-zh_CN.zip';
		}
	}
	return $value;
});
